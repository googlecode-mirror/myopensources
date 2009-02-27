::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
::
:: Database migration tools
:: Author: John Meng (孟远螓) arzen1013@gmail.com 2009-2-20
::
::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
cls
@echo.
@echo off
SET path = "%path%;c:\php;d:\php;d:\xampp\php;"
SET app=%0
SET lib=%~dp0

php -q "%lib%run.php" -working "%CD%" %*

echo.