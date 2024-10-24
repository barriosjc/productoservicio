# SDN challenge

Este proyecto es una aplicación PHP que utiliza Apache y PostgreSQL, todo dentro de contenedores Docker. A continuación, se detallan los pasos para descargar el proyecto y ejecutarlo en tu entorno local.
El proyecto utiliza un Server Apache, una server PostgreSql con una base de datos llamada "sdn" con sus datos y una aplicación PHP que se encuentra en la carpeta "productoservicio".

### Requisitos previos

Antes de comenzar, asegúrate de tener instalados los siguientes programas:

- **Git**: Para clonar el repositorio.
- **Docker**: Para ejecutar los contenedores.
- **Docker desktop**: Para ejecutar los contenedores si utiliza sistemas operativos windows.

### Clonar el repositorio

Primero, clona el repositorio en tu máquina local. En una terminal, ejecuta el siguiente comando:

```bash
git clone https://github.com/barriosjc/productoservicio.git
cd productoservicio
composer install
```
### Correr el proyecto
Para correr el proyecto, ejecuta el siguiente comando:
Debe tener docker desktop corriendo en su computadora si utiliza sistemas operativos windows.
En una terminal, dentro de la carpeta "productoservicio", ejecuta el siguiente comando:
```bash
docker-compose up --build -d
```
desde un navegador web, ingresa a la siguiente dirección:
```
http://docker-sdn:8080/
ó
http://localhost:8080/
```

