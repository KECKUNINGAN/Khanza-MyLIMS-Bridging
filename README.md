# SIMKES Khanza MYLIMS Bridging Via LISLICA Script
Bridging SIMKES Khanza dental Sistem Informasi Laboratorium MyLIMS

Setting Nginx Rewrite
```php
location / {
        root   /usr/share/nginx/html;
        index  index.html index.htm;
        if (!-e $request_filename) {
           rewrite ^/lis/get/(.*)$ /lis/get.php?get=$1 last;
           rewrite ^/lis/insert(.*)$ /lis/insert.php?$1 last;
           break;
        }

    }
```
