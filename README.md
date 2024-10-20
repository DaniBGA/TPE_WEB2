# TPE_WEB2
# PARTE 1:
Tp Especial web 2

Nuestra base de datos trata de una concesionaria de autos, donde se almacena información sobre los autos y las categorías a las que pertenecen. Un auto pertenece a una única categoría.

Estructura de la Base de Datos:
Tabla categoria:

marca: para identificar la marca de el auto.
descripcion: para tener una descripcion de la marca del auto.


Tabla producto (autos):

nombre: para saber que nombre del auto.
modelo: modelo de vehículo (por ejemplo, 2004, 2010).
kilometros: kilometros del auto (si es 0km es nuevo; si tiene un valor distinto de 0 es usado).
motor: para saber que tipo de motor contiene el auto.
marca: se vincula a la tabla (categoria) para saber de que marca es el auto.
Precio: Precio de referencia para el producto.

La tabla principal es producto, en la cual se relaciona la marca de la tabla categoria. Esto permite que un auto esté asociado a una única categoría, mientras que una categoría puede tener múltiples autos.

Integrantes :
Sequeira Lautaro (46.693.324)
Gongora Banegas Daniel (46116932)
![image](https://github.com/user-attachments/assets/45ed6272-b567-4d39-8dda-735551438c3a)

# PARTE 2:
MODIFICACIONES: 

Estructura de la Base de Datos:
Tabla categoria:

id: identificador para las marcas
marca: para saber el nombre de la marca


Tabla producto (autos):

nombre: para saber que nombre del auto.
modelo: modelo de vehículo (por ejemplo, 2004, 2010).
imagen: imagen por URL del auto.
kilometros: kilometros del auto (si es 0km es nuevo; si tiene un valor distinto de 0 es usado).
motor: para saber que tipo de motor contiene el auto.
marca: se vincula a la tabla (categoria) para saber de que marca es el auto.
Precio: Precio de referencia para el producto.

tabla usuarios:

id: identificador para el usuario.
usuario: nombre de el usuario.
password: contraseña del usuario.
role: rol del usuario.

en esta actualizacion de la pagina se logro que con un usuario administrador "usuario: admin, password: admin", logra realizar modificaciones como: 
.agregar producto.
.update producto.
.eliminar producto.
.agregar categoria.
.editar categoria.
.eliminar categoria.



ademas tambien cuenta con un usuario comun para corroborar que no pueda acceder a ninguna funcion que solo pueda realizar un admin.

usuario: usuario
password: usuario123

![image](https://github.com/user-attachments/assets/5bff4e24-bd57-4aa8-b296-461111d6a1b6)




