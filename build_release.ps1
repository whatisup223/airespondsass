$ErrorActionPreference = "Stop"

Write-Host "--- Starting Build ---"
if (-not (Test-Path "node_modules")) { npm.cmd install }
npm.cmd run build

if (Test-Path "dist") { Remove-Item "dist" -Recurse -Force }


$distDir = "dist"
$coreDirName = "airesponds_core"
$corePath = "$distDir\$coreDirName"
$publicPath = "$distDir\public_html"

if (-not (Test-Path $distDir)) { New-Item -ItemType Directory -Path $distDir | Out-Null }

Write-Host "--- Copying Files ---"
$ro = Robocopy . $corePath /MIR /XD .git node_modules dist tests .idea .vscode /XF .gitignore .env.example /NFL /NDL /NJH /NJS
if ($LASTEXITCODE -ge 8) { Write-Error "Robocopy failed"; exit 1 }

if (-not (Test-Path $publicPath)) { New-Item -ItemType Directory -Path $publicPath | Out-Null }
Get-ChildItem -Path "$corePath\public\*" | Move-Item -Destination $publicPath -Force
Remove-Item "$corePath\public" -Force -Recurse

Write-Host "--- Configuring index.php ---"
$indexFile = "$publicPath\index.php"
$indexContent = Get-Content $indexFile -Raw
$indexContent = $indexContent.Replace("require __DIR__.'/../storage/framework/maintenance.php';", "if (file_exists(__DIR__.'/../$coreDirName/storage/framework/maintenance.php')) { require __DIR__.'/../$coreDirName/storage/framework/maintenance.php'; }")
$indexContent = $indexContent.Replace("require __DIR__.'/../vendor/autoload.php';", "require __DIR__.'/../$coreDirName/vendor/autoload.php';")
$indexContent = $indexContent.Replace("`$app = require_once __DIR__.'/../bootstrap/app.php';", "`$app = require_once __DIR__.'/../$coreDirName/bootstrap/app.php';`n`n`$app->usePublicPath(__DIR__);")
Set-Content -Path $indexFile -Value $indexContent

Write-Host "--- Finalizing ---"
Copy-Item "INSTRUCTIONS_TEMPLATE.txt" "$distDir\INSTRUCTIONS.txt"
if (Test-Path "DEPLOYMENT_GUIDE_AR.md") { Copy-Item "DEPLOYMENT_GUIDE_AR.md" "$distDir\DEPLOYMENT_GUIDE_AR.md" }

Write-Host "Build Complete! Check the $distDir folder."
