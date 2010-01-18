@echo off

if "%OS%" == "Windows_NT" goto WinNT

:Win9X
echo Don't be stupid! Win9x don't know Services
echo Please use apache_stop.bat instead
goto exit

:WinNT
echo Are you sure you wan't this?
echo now stopping eapm_a when it runs
net stop eapm_a
echo Time to say good bye to eapm_a :(
bin\apache -k uninstall -n eapm_a

:exit
