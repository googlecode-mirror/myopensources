@echo off 


echo Installing MySQL as an Service 
bin\mysqld-nt --install eapm_m --defaults-file="%cd%\my.ini"
echo Try to start the MySQL deamon as service ... 
net start eapm_m 

:exit 
