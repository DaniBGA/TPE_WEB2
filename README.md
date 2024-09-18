# TPE_WEB2
Tp Especial web 2

Nuestra base de datos trata de una concesionaria de autos, donde se almacena información sobre los autos y las categorías a las que pertenecen. Un auto pertenece a una única categoría.

Estructura de la Base de Datos:
Tabla categoria:

ID: Identificador único de la categoría.
TIPO: Tipo de vehículo (por ejemplo, SUV, Sedán).
ID_Modelo: Modelo del auto.
ID_año: Año del modelo.
Precio: Precio de referencia para la categoría.
Tabla producto (autos):

ID: Identificador único del auto.
Modelo: Nombre del modelo del auto.
Año: Año del auto.
Precio: Precio del auto.
categoria_id: Relación que conecta el auto con una categoría de la tabla categoria.
Relación entre tablas:
La tabla principal es producto, en la cual se relaciona el categoria_id con la tabla categoria. Esto permite que un auto esté asociado a una única categoría, mientras que una categoría puede tener múltiples autos.

Integrantes :
Sequeira Lautaro (46.693.324)
Gongora Banegas Daniel (46116932)
