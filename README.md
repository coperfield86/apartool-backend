# Apartool Backend

##Descargar del código y las librerías
### Pasos
- git clone URL GITHUB
- composer install

##Pasos para levantar el ambiente de desarrollo en Docker
### Pasos
- alias sail='bash vendor/bin/sail'
- sail up -d

## Creación de tablas y llenado de las mismas
### Pasos
- sail artisan migrate
- sail artisan db:seed


## Consumir los servicios de la api
[Aquí](https://documenter.getpostman.com/view/2133040/Tzm6jvU1) se puede enontrar una breve explicación de los servicios y un link para poderlos testear con postman.

## Pruebas
Para correr las pruebas se deberá ejecutar el script:
- sail test
