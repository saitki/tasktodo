# tasktodo

### Herramientas Utilizadas
                
1. Mysql
2. Php
3. Bootstrap Online
4. Laragon
              
----
### Pasos para importar el proyecto              
####Clonar repositorio
Se descargar o se clona el proyecto, en la carpeta o ubicacion donde este configurada para estar en linea, en laragon la ubicacion en windows es C:\laragon\www\:

`$ git clone https://github.com/saitki/tasktodo.git`

Accedemos a la raiz del proyecto, y el archivo sqldatabase.sql lo importamos en nuestra base de datos mysql. Ya sea abriendo el sql en un bloc de notas, edit de texto o lo importarmos como un archivo sql.

Luego inicializamos los servicios de base de datos y el servidor apache o NGINX, en este caso en laragon.

####Herramientas Manuales o kit de herramientas
En el proyecto de utilizo laragon, para tener php, apache, mysql preconfigurado para el desarrollo de este proyecto. Se puede utilzar xampp u otro software que ofrezca tales herramientas. O prepararlo manualmente.

### Pasos para configurar el proyecto 

Si las credenvciales de acceso a nuestra base de datos es root y sin contraseña omita este paso, sino nos dirigimos en la ubicacion de la raiz del proyecto, a la carpeta

> DataBase

Y abrimos el archivo de la conexion a la base de datos 

> database.php 

Cambiamos las credenciales por defecto por las nuestras.
Listo, ahora disfruta probando el proyecto...