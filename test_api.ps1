# Test API Endpoint
$body = @{
    access_token = "test_token_123"
} | ConvertTo-Json

try {
    $response = Invoke-WebRequest -Uri "http://127.0.0.1:8000/api/accounts/fetch" `
        -Method POST `
        -ContentType "application/json" `
        -Body $body `
        -TimeoutSec 10

    Write-Host "Status Code: $($response.StatusCode)"
    Write-Host "Response: $($response.Content)"
} catch {
    Write-Host "Error: $_"
    Write-Host "Status Code: $($_.Exception.Response.StatusCode.value__)"
}
