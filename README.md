
## Configuracion Proyecto

Se require establecer las siguientes variables en el archivo .env con los siguientes datos:

BASE_URL=https://test.conectadosweb.com.co/users

TOKEN_API=token_api suministrado.

Una vez realizada la anterior configuración e iniciado el servidor con php artisan serve, se pueden consumir los servicios desde la siguiente URL: http://localhost:8000/listarUsuarios 

La API tiene como endpoint http://localhost:8000/api/findUser/id en este caso el id debera ser un id de usuario existente; por ejemplo:  http://localhost:8000/api/findUser/2 Esta es posible de consumir desde una aplicación como postman.

En caso de contar con otro ambiente difirente al de desarrollo, se debería reempalzar el localhost por la ip o dominio respetivo y el puerto:8000 por el puerto correspondiente.


