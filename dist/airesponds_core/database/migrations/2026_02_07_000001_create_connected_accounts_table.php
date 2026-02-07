<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('connected_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('platform', ['facebook', 'instagram']);
            $table->string('platform_id'); // Page ID or Instagram Business Account ID
            $table->string('name'); // Page/Account Name
            $table->text('access_token');
            $table->boolean('is_active')->default(true);
            $table->json('metadata')->nullable(); // Store additional info (followers, category, etc.)
            $table->timestamps();

            $table->unique(['user_id', 'platform', 'platform_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('connected_accounts');
    }
};
