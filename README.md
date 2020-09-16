# Crud de usuarios
Crud de usuarios con PHP, MVC POO 

1. Puede crear y generar usuarios  a través de la interfaz de la aplicación
2. Realizado bajo MVC, POO, plantilla html Material Dashboard Pro


# Instalación y uso

1. Se requiere PHP en su version 7 en adelante. Recomendable tener tu entorno de prueba XAMPP en Windows o MAMP en Mac.
2. Poner en htdocs la carpeta del proyecto, (un nombre sin espacios).
3. En la estrucutura de directorios se cuenta con 3 archivos **.htaccess** de estos se tiene que cambiarle algo a uno de estos.
4. En la carpeta **public** se modifica en el **.htaccess** la linea ***/crud/public/*** por el nombre que le hayas puesto a tu directorio en htdocs. Como ejemplo, ***crud*** es la carpeta que contiene el proyecto, su **.htaccess** queda así:

~~~
<IfModule mod_rewrite.c>
    Options -Multiviews
    RewriteEngine On
    RewriteBase /crud/public/
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]
</IfModule>
~~~


6. Dentro del directorio **app/config** hay un archivo llamado **config.php** con un contenido que tiene unas contantes. En tu caso modificas el valor de la constante **URLROOT** por el de tu entorno. y **ROOTFOLDER** por el nombre de tu carpeta en htdocs. No olvides igual modificar los datos de acceso a tu base de datos.

~~~
    <?php 

    //parametros Base de datos
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', 'root');
    define('DB_NAME', 'crudusers');

    // Raíz de la aplicación
    define('APPROOT', dirname(dirname (__FILE__)));
    // Url raíz
    define('URLROOT', 'http://localhost:8888/crud');
    //nombre del sitio
    define('SITENAME', 'Crud Users');
    // version de nuestro aplicacion/framework
    define('APPVERSION', 'V1.0.0');

    define('ROOTFOLDER','/crud/');

~~~

7. Los usuarios de prueba del crud, disponibles el sql en el repositorio

~~~

Bruce One
usuario1@gmail.com
123456

Avonlea Livvy
iapetus@yahoo.ca
VyQTXqzkRU

Dorean Trey
dmiller@icloud.com
9PU5XoMxnP

Bret Dianna
bflong@me.com
oa92gTkk1e

Dorris Michael
munge@aol.com
fCDtlf5XzT

Alyce Alva
penna@msn.com
UT5D78wyAl

Maurice Taylor
nullchar@outlook.com
4onp4Xv19o

Luvenia Colin
pedwards@msn.com
Pp6bIB9bDM

Arin Herbert
macro@icloud.com
NLT41lmvoc

Winston Kym
jbailie@aol.com
0dVSRC1LAQ

Tillie Rosamond
martink@icloud.com
w5ouIpnNUE

~~~