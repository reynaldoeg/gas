<h1>Gas</h1>
<h2>Srpago</h2>

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

Este sitio permite consultar la ubicación geográfica de las gasolineras de México y precio de venta de gasolina por litro.

## Instalación

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

### Migraciones y Base de Datos

El proyecto cuenta con una base de datos basada en la información proporcionada por Sepomex con los difrentes estados, municipios y códigos postales.

Se separó en distintas tablas para cumplir con el proceso de Normalización de Baese de Datos. 

Tabla Estados

id  | clave   | clave3| estado
--- | ---     | ---   | ---
1   | AG      | AGU   | Aguascalientes
2   | BC      | BCN   | Baja California
3   | BS      | BCS   | Baja California Sur

Tabla Municipios

id  | id_estado | municipio
--- | ---       | ---
272 | 9         | Azcapotzalco
273 | 9         | Benito Juarez
374 | 9         | Coyoacan

Tabla de Códigos Postales

id  | codigo| id_municipio  | asentamiento
--- | ---   | ---           | ---
272 | 02000 | 272           | Centro de Azcapotzalco
273 | 02010 | 272           | Los Reyes
374 | 02020 | 272           | San Marcos

Para poder generar estas tablas, se sigue el proceso de migraciones descrito en Laravel

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
