<?php

namespace App\Http\Controllers;

use App\Models\ConnectedAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AccountConnectionController extends Controller
{
    /**
     * Fetch Facebook Pages and Instagram Accounts using User Access Token
     */
    public function fetchAccounts(Request $request)
    {
        $request->validate([
            'access_token' => 'required|string',
        ]);

        $accessToken = $request->access_token;
        // Temporarily disabled for testing
        // $userId = auth()->id();

        try {
            // Fetch Facebook Pages
            $facebookPages = $this->fetchFacebookPages($accessToken);

            // Fetch Instagram Business Accounts
            $instagramAccounts = $this->fetchInstagramAccounts($accessToken, $facebookPages);

            return response()->json([
                'success' => true,
                'data' => [
                    'facebook' => $facebookPages,
                    'instagram' => $instagramAccounts,
                ],
            ]);

        } catch (\Exception $e) {
            Log::error('Account fetch failed: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch accounts. Please check your access token.',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Fetch Facebook Pages from Graph API
     */
    private function fetchFacebookPages($accessToken)
    {
        Log::info('Fetching Facebook pages...');

        $response = Http::timeout(10)->get('https://graph.facebook.com/v18.0/me/accounts', [
            'access_token' => $accessToken,
            'fields' => 'id,name,access_token,category,fan_count',
        ]);

        Log::info('Facebook API response status: ' . $response->status());

        if ($response->failed()) {
            Log::error('Facebook API failed: ' . $response->body());
            throw new \Exception('Failed to fetch Facebook pages: ' . $response->body());
        }

        $data = $response->json();
        Log::info('Facebook pages count: ' . count($data['data'] ?? []));

        return collect($data['data'] ?? [])->map(function ($page) {
            return [
                'id' => $page['id'],
                'name' => $page['name'],
                'access_token' => $page['access_token'],
                'category' => $page['category'] ?? 'Unknown',
                'followers' => $page['fan_count'] ?? 0,
            ];
        })->toArray();
    }

    /**
     * Fetch Instagram Business Accounts from Graph API
     */
    private function fetchInstagramAccounts($accessToken, $facebookPages)
    {
        $instagramAccounts = [];

        foreach ($facebookPages as $page) {
            try {
                $response = Http::timeout(10)->get("https://graph.facebook.com/v18.0/{$page['id']}", [
                    'access_token' => $page['access_token'],
                    'fields' => 'instagram_business_account',
                ]);

                if ($response->successful()) {
                    $data = $response->json();

                    if (isset($data['instagram_business_account']['id'])) {
                        $igId = $data['instagram_business_account']['id'];

                        // Fetch Instagram account details
                        $igResponse = Http::timeout(10)->get("https://graph.facebook.com/v18.0/{$igId}", [
                            'access_token' => $page['access_token'],
                            'fields' => 'id,username,name,followers_count,profile_picture_url',
                        ]);

                        if ($igResponse->successful()) {
                            $igData = $igResponse->json();
                            $instagramAccounts[] = [
                                'id' => $igData['id'],
                                'name' => '@' . ($igData['username'] ?? $igData['name']),
                                'access_token' => $page['access_token'],
                                'username' => $igData['username'] ?? null,
                                'followers' => $igData['followers_count'] ?? 0,
                                'profile_picture' => $igData['profile_picture_url'] ?? null,
                            ];
                        }
                    }
                }
            } catch (\Exception $e) {
                Log::warning("Failed to fetch Instagram for page {$page['id']}: " . $e->getMessage());
                continue;
            }
        }

        return $instagramAccounts;
    }

    /**
     * Toggle account activation status
     */
    public function toggleAccount(Request $request)
    {
        $request->validate([
            'platform' => 'required|in:facebook,instagram',
            'platform_id' => 'required|string',
            'name' => 'required|string',
            'access_token' => 'required|string',
            'is_active' => 'required|boolean',
            'metadata' => 'nullable|array',
        ]);

        // Temporarily disabled for testing - use user_id = 1
        $userId = 1; // auth()->id();

        $account = ConnectedAccount::updateOrCreate(
            [
                'user_id' => $userId,
                'platform' => $request->platform,
                'platform_id' => $request->platform_id,
            ],
            [
                'name' => $request->name,
                'access_token' => $request->access_token,
                'is_active' => $request->is_active,
                'metadata' => $request->metadata,
            ]
        );

        return response()->json([
            'success' => true,
            'message' => $request->is_active ? 'Account activated successfully' : 'Account deactivated successfully',
            'account' => $account,
        ]);
    }

    /**
     * Get user's connected accounts
     */
    public function getConnectedAccounts()
    {
        // Temporarily disabled for testing - use user_id = 1
        $userId = 1; // auth()->id();

        $accounts = ConnectedAccount::where('user_id', $userId)
            ->select('id', 'platform', 'platform_id', 'name', 'is_active', 'metadata', 'created_at')
            ->get()
            ->groupBy('platform');

        return response()->json([
            'success' => true,
            'data' => [
                'facebook' => $accounts->get('facebook', collect())->values(),
                'instagram' => $accounts->get('instagram', collect())->values(),
            ],
        ]);
    }
}
