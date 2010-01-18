@echo off

if "%OS%" == "Windows_NT" goto WinNT

:Win9X
echo Don't be stupid! Win9x don't know Services
echo Please use apache_start.bat instead
goto exit

:WinNT
echo Installing eapm_a as an Service
bin\apache -k install -n eapm_a
echo Now we Start eapm_a :)
net start eapm_a

:exit
