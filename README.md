# Lista Paso a Paso

## Levantar el Contenedor y Crear las Imágenes

1. Asegúrate de que Docker y Docker Compose están instalados.
2. Navega al directorio del proyecto: `/c:/prueba/`.
3. Ejecuta el comando para levantar los servicios definidos en `docker-compose.yml`:
   ```bash
   docker-compose up -d
   ```

## Ejecutar MySQL

1. Verifica que el contenedor de MySQL está en ejecución:
   ```bash
   docker ps
   ```
2. Accede a MySQL dentro del contenedor:
   ```bash
   docker exec -it <nombre_del_contenedor_mysql> mysql -u root -p
   ```
   Sustituye `<nombre_del_contenedor_mysql>` por el nombre del contenedor correspondiente a MySQL.

## Acceder a `prueba1` y `prueba2`

1. Asegúrate de que los servicios `prueba1` y `prueba2` están configurados en `docker-compose.yml`.
2. Accede a los servicios en sus respectivas direcciones en el navegador:
   - `http://localhost/prueba1` para `prueba1`.
   - `http://localhost/prueba2/psychology-clinic/src/views/index.php` para `prueba2`.