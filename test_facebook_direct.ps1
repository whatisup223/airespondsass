# Test Facebook API directly
$token = "EAASKFLHWACMBQlVPcpZBNVX6WWccRo0vabkjxlHRQ0rktBk84Kly0yngfZB7GY7Mddyll71oBB47tD3zHdbZCis20qeNd8AhVTzrY1ZCCy3ZBS1fsrl62FlOXnCsZCgVNk7HFijz4ZAhQh3myW7MvJuZAlPkcynFamoITxGErBAP5WRSCGf81qZBYgO51zlCwTd6I"

Write-Host "Testing Facebook Graph API directly..."

try {
    $url = "https://graph.facebook.com/v18.0/me/accounts?access_token=$token&fields=id,name,access_token,category,fan_count"
    
    Write-Host "URL: $url"
    Write-Host "`nSending request..."
    
    $response = Invoke-RestMethod -Uri $url -Method GET -TimeoutSec 15
    
    Write-Host "`nSuccess!"
    Write-Host "Pages found: $($response.data.Count)"
    Write-Host "`nPages:"
    $response.data | ForEach-Object {
        Write-Host "  - $($_.name) (ID: $($_.id))"
    }
    
} catch {
    Write-Host "`nError: $_"
}
