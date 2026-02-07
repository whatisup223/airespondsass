@echo off
echo ========================================
echo   Running Laravel Migration
echo ========================================
echo.

php artisan migrate

echo.
echo ========================================
echo   Migration Complete!
echo ========================================
echo.
pause
