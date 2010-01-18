@echo off

if "%OS%" == "Windows_NT" goto WinNT

:Win9X
echo Don't be stupid! Win9x don't know Services
echo Please use mysql_stop.bat instead
goto exit

:WinNT
echo now stopping MySQL when it runs
net stop eapm_m
echo Uninstalling MySql-Service
bin\mysqld-nt --remove eapm_m

:exit
