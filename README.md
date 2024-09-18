# TPE_WEB2
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
