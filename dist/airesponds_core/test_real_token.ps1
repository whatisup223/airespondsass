# Test with real Facebook token
$token = "EAASKFLHWACMBQlVPcpZBNVX6WWccRo0vabkjxlHRQ0rktBk84Kly0yngfZB7GY7Mddyll71oBB47tD3zHdbZCis20qeNd8AhVTzrY1ZCCy3ZBS1fsrl62FlOXnCsZCgVNk7HFijz4ZAhQh3myW7MvJuZAlPkcynFamoITxGErBAP5WRSCGf81qZBYgO51zlCwTd6I"

$body = @{
    access_token = $token
} | ConvertTo-Json

Write-Host "Testing API with real token..."
Write-Host "Token: $($token.Substring(0, 20))..."

try {
    $response = Invoke-WebRequest -Uri "http://127.0.0.1:8000/api/accounts/fetch" `
        -Method POST `
        -ContentType "application/json" `
        -Body $body `
        -TimeoutSec 30

    Write-Host "`nStatus Code: $($response.StatusCode)"
    Write-Host "`nResponse:"
    $response.Content | ConvertFrom-Json | ConvertTo-Json -Depth 10
} catch {
    Write-Host "`nError occurred!"
    Write-Host "Status Code: $($_.Exception.Response.StatusCode.value__)"
    
    if ($_.Exception.Response) {
        $reader = New-Object System.IO.StreamReader($_.Exception.Response.GetResponseStream())
        $responseBody = $reader.ReadToEnd()
        Write-Host "`nError Response:"
        Write-Host $responseBody
    }
}
