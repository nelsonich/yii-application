<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template</h1>
    <br>
</p>


## RUN PROJECT INSTRUCTION FOR NGINX

To deploy this project run

```
  1) sudo nano /etc/nginx/sites-available/site_name_fontend.conf
  
  server {
    charset utf-8;
    client_max_body_size 128M;

    listen 80; ## listen for ipv4
    #listen [::]:80 default_server ipv6only=on; ## listen for ipv6

    server_name yii-frontend.test;
    root        /var/www/yii-application/frontend/web/;
    index       index.php;

    access_log  /var/www/yii-application/log/frontend-access.log;
    error_log   /var/www/yii-application/log/frontend-error.log;

    location / {
        # Redirect everything that isn't a real file to index.php
        try_files $uri $uri/ /index.php$is_args$args;
    }

    # uncomment to avoid processing of calls to non-existing static files by Yii
    #location ~ \.(js|css|png|jpg|gif|swf|ico|pdf|mov|fla|zip|rar)$ {
    #    try_files $uri =404;
    #}
    #error_page 404 /404.html;

    # deny accessing php files for the /assets directory
    location ~ ^/assets/.*\.php$ {
        deny all;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~* /\. {
        deny all;
    }
  }
```

```
  2) sudo nano /etc/nginx/sites-available/site_name_backend.conf

  server {
      charset utf-8;
      client_max_body_size 128M;

      listen 80; ## listen for ipv4
      #listen [::]:80 default_server ipv6only=on; ## listen for ipv6

      server_name yii-backend.test;
      root        /var/www/yii-application/backend/web/;
      index       index.php;

      access_log  /var/www/yii-application/log/backend-access.log;
      error_log   /var/www/yii-application/log/backend-error.log;

      location / {
          # Redirect everything that isn't a real file to index.php
          try_files $uri $uri/ /index.php$is_args$args;
      }

      # uncomment to avoid processing of calls to non-existing static files by Yii
      #location ~ \.(js|css|png|jpg|gif|swf|ico|pdf|mov|fla|zip|rar)$ {
      #    try_files $uri =404;
      #}
      #error_page 404 /404.html;

      # deny accessing php files for the /assets directory
      location ~ ^/assets/.*\.php$ {
          deny all;
      }

      location ~ \.php$ {
          fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
          fastcgi_index index.php;
          fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
          include fastcgi_params;
      }

      location ~* /\. {
          deny all;
      }
  }
```

```
  3) sudo ln -s /etc/nginx/sites-available/site_name_fontend.conf /etc/nginx/sites-enabled/
  4) sudo ln -s /etc/nginx/sites-available/site_name_backend.conf /etc/nginx/sites-enabled/
  5) sudo nginx -t
  6) append site name to /etc/hosts
  7) sudo systemctl restart nginx
```

## DB Migrations

```
1) php yii migrate --migrationPath=@yii/rbac/migrations

2) php yii migrate
```



Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![build](https://github.com/yiisoft/yii2-app-advanced/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-advanced/actions?query=workflow%3Abuild)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
