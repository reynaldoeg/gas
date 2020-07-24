<h1>Gas</h1>
<h2>Srpago</h2>

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>


## instalación

Descargar el repositorio de github.
```s 
$ git@github.com:reynaldoeg/gas.git
```

Entrar a la raiz del directorio
```s 
$ cd gas
```

Instalar dependencias con Composer
```s 
$ composer install
```

Copiar archivo .env.example y cambiarle el nombre por .env y configurar opciones locales
```s 
$ cp .env.example .env
```

Generar "application key"
```s 
$ php artisan key:generate
```

Generar tabla de Migraciones 
```s 
$ php artisan migrate:install
```

Correr Migraciones para generar las tablas del sistema
```s 
$ php artisan migrate
```

Correr servidor local
```s 
$ php artisan serve
```

<p>Laravel se podrá ejecutar en la siguiente dirección <a href="http://127.0.0.1:8000" target="_blank">http://127.0.0.1:8000</a></p>
