# Run Laravel Migration
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "  Running Laravel Migration" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

# Try to find PHP
$phpPaths = @(
    "C:\laragon\bin\php\php-8.2.12-Win32-vs16-x64\php.exe",
    "C:\laragon\bin\php\php-8.1\php.exe",
    "C:\laragon\bin\php\php-8.0\php.exe",
    "C:\xampp\php\php.exe",
    "php"
)

$phpFound = $false
$phpPath = ""

foreach ($path in $phpPaths) {
    if ($path -eq "php") {
        try {
            $null = & php --version 2>&1
            $phpFound = $true
            $phpPath = "php"
            break
        } catch {
            continue
        }
    } elseif (Test-Path $path) {
        $phpFound = $true
        $phpPath = $path
        break
    }
}

if ($phpFound) {
    Write-Host "✓ PHP found!" -ForegroundColor Green
    Write-Host ""
    
    Write-Host "Running migration..." -ForegroundColor Yellow
    Write-Host ""
    
    & $phpPath artisan migrate
    
    Write-Host ""
    Write-Host "========================================" -ForegroundColor Cyan
    Write-Host "  Migration Complete!" -ForegroundColor Green
    Write-Host "========================================" -ForegroundColor Cyan
} else {
    Write-Host "✗ PHP not found automatically" -ForegroundColor Red
    Write-Host ""
    Write-Host "Please run this command manually in Laragon Terminal:" -ForegroundColor Yellow
    Write-Host "  php artisan migrate" -ForegroundColor White
}
