# PHP + ADODB Working Example

PHP ADODB configuration steps:
1) Install PHP for windows (32-bit)
2) In php.ini, add/uncomment:
   - extension=php_com_dotnet
   - com.allow_dcom = true
   - com.autoregister_typelib = true
      - com.autoregister_typelib is optional, I don't think this works with ADODB
3) After making changes in php.ini, open cmd.exe as administrator and execute:
   - iisreset
     - Restart the website in iis too just to be sure
