<h1>Gas</h1>
<h2>Srpago</h2>

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

- [Instalación](#Instalación)
  * [Migraciones y Base de Datos](#migraciones-y-base-de-datos)
- [API](#api)
  * [Métodos para obtener estados y municipios](#métodos-para-obtener-estados-y-municipios)
  * [Métodos para obtener gasolinerias](#métodos-para-obtener-gasolinerias)
- [Front](#front)


Este sitio permite consultar la ubicación geográfica de las gasolineras de México y precio de venta de gasolina por litro.

## Instalación

Descargar el repositorio de github.
```s 
$ git clone git@github.com:reynaldoeg/gas.git
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

Seeds para llenar la información de las bases de datos
```s 
$ php artisan db:seed
```

Correr servidor local
```s 
$ php artisan serve
```

<p>Laravel se podrá ejecutar en la siguiente dirección de manera local <a href="http://127.0.0.1:8000" target="_blank">http://127.0.0.1:8000</a></p>

El sistema se encuantra se encuentra funcional en la siguiente dirección
 [http://ec2-54-185-117-154.us-west-2.compute.amazonaws.com/](http://ec2-54-185-117-154.us-west-2.compute.amazonaws.com/)

## API

El sistema cuenta con una API para poder consultar la información que proporciona el sistema.

La url base del api es:

http://ec2-54-185-117-154.us-west-2.compute.amazonaws.com/api/

### Métodos para obtener estados y municipios

Método  | URI                           | Función
---     | ---                           | ---
GET     | /getstates                    | Regresa una lista de los estados de MX
GET     | /getmunicipality/{id_state}   | Regresa una lista de los municipios del estado


Ejemplo (getstates):

GET: http://ec2-54-185-117-154.us-west-2.compute.amazonaws.com/api/getstates

Regresa el siguiente JSON:

```s 
[
    {
        "clave": "AG",
        "clave3": "AGU",
        "estado": "Aguascalientes"
    },
    {
        "clave": "BC",
        "clave3": "BCN",
        "estado": "Baja California"
    },
    {
        "clave": "BS",
        "clave3": "BCS",
        "estado": "Baja California Sur"
    },
    ...
]
```

Ejemplo (getmunicipality/{id_state}):

GET: http://ec2-54-185-117-154.us-west-2.compute.amazonaws.com/api/getmunicipality/9

Regresa el siguiente JSON:

```s 
[
    {
        "municipio": "Azcapotzalco",
        "c_mnpio": "002"
    },
    {
        "municipio": "Benito Juárez",
        "c_mnpio": "014"
    },
    {
        "municipio": "Coyoacán",
        "c_mnpio": "003"
    },
    ...
]
```

### Métodos para obtener gasolinerias:

Método  | URI               | Función
---     | ---               | ---
GET     | /getallgases      | Regresa un listado de todas las gasolineras de MX
GET     | /getalllocations  | Regresa un listado de todas las coordenadas geograficas de las gasolineras. (Utilizado para pintar el mapa general de ubicaciones)
GET     | /getgas/{place_id}| Regresa el detalle de la gasolinería indicada en id que se envía


Ejemplo (getallgases):

GET: http://ec2-54-185-117-154.us-west-2.compute.amazonaws.com/api/getallgases

Regresa el siguiente JSON:

```s 
{
    "success": true,
    "results": [
        {
            "place_id": "2039",
            "name": "ESTACION DE SERVICIO CALAFIA, S.A. DE C.V.",
            "cre_id": "PL/658/EXP/ES/2015",
            "longitud": "-116.9214",
            "latitud": "32.47641"
        },
        {
            "place_id": "2040",
            "name": "DIGEPE, S.A. DE C.V. (07356)",
            "cre_id": "PL/902/EXP/ES/2015",
            "longitud": "-99.74484",
            "latitud": "20.3037"
        },
        ...
    ]
}
```

Ejemplo (getalllocations):

GET: http://ec2-54-185-117-154.us-west-2.compute.amazonaws.com/api/getalllocations

Regresa el siguiente JSON:

```s 
{
    "success": true,
    "results": [
        {
            "title": "2039",
            "loc": {
                "lng": -116.9214,
                "lat": 32.47641
            }
        },
        {
            "title": "2040",
            "loc": {
                "lng": -99.74484,
                "lat": 20.3037
            }
        },
        ...
    ]
}
```

Ejemplo (getgas/{place_id}):

GET: http://ec2-54-185-117-154.us-west-2.compute.amazonaws.com/api/getgas/6684

Regresa el siguiente JSON:

```s 
{
    "success": true,
    "results": [
        {
            "place_id": "6684",
            "name": "SERVICIO ORIENTAL, S.A. DE C.V. ",
            "cre_id": "PL/4092/EXP/ES/2015",
            "longitud": "-99.07299",
            "latitud": "19.39704",
            "regular": "18.99",
            "premium": "19.49"
        }
    ]
}
```

## Front

El la barra de navegación cuenta con un cuadro para buscar por el ID de la gasolinera, al presionar el botón de búsqueda, apareceran los precios de la gasolina, los datos de la estación y la ubicación en el mapa.

![alt text](https://raw.githubusercontent.com/reynaldoeg/gas/master/public/img/front01.PNG)

En la parte de abajo, aparece un mapa de todas las gasolineras en el país, al dar un clic en el icono de agrupación, se ira acercando la zona y al colocar el puntero sobre el pin de ubicación, aparecera el ID de la gasolinería.

![alt text](https://raw.githubusercontent.com/reynaldoeg/gas/master/public/img/front02.PNG)