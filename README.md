# hlimacorretor
Projeto de Anúncios de Imóveis  

# .env
```.env
# CONFIGURACAO PASTA DIR
URLBASE=

# CONFIGURACAO ENVIO DE EMAIL
MAIL_ROOT=
MAIL_PORT=
MAIL_USER=
MAIL_PASSWORD=
MAIL_NAME=
MAIL_EMAIL=

# CONFIGURACAO BANCO DE DADOS
ROOT=localhost
PORT=3306
DBNAME=db_hlima
USERNAME=root
PASSWORD=root
```

# .htaccess

```.htaccess
RewriteEngine On
#Options All -Indexes

## ROUTER WWW Redirect.
#RewriteCond %{HTTP_HOST} !^www\. [NC]
#RewriteRule ^ https://www.%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

## ROUTER HTTPS Redirect
#RewriteCond %{HTTP:X-Forwarded-Proto} !https
#RewriteCond %{HTTPS} off
#RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# ROUTER URL Rewrite
RewriteCond %{SCRIPT_FILENAME} !-f
RewriteCond %{SCRIPT_FILENAME} !-d
RewriteRule ^(.*)$ index.php?route=/$1 [L,QSA]
```