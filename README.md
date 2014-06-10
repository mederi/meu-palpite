meu-palpite
===========

Sistema de Bolão para a copa do Brasil

Pré-Requisitos
----------
* PHP 5.4
* Composer

Como Instalar
-------------

```shell
git clone https://github.com/mederi/meu-palpite.git
cd meu-palpite
composer install
php bin/install_db.php
php -S localhost:8000 -t web
```

Executar os Testes
------------------

```shell
cd meu-palpite
php vendor/bin/phpunit tests
```