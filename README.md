# Tpe-2-WEB2
Implementacion de API Restfull para la segunda entrega de TPE en WEB 2

ENDPOINTS Beer(item)

(GET) /api/beer Devuelve todas las cervezas
(GET) /api/beer/:ID Devuelve una cerveza en especifico
(GET) /api/beer/

(POST) /api/beer Crea una cerveza
	
	ej:
    {
        "idtipo": "1",
        "nombre": "NUEVA",
        "resumen": "Las cervezas que nos han acompañado desde un principio, gracias a las cuales somos quiénes somos hoy."
    }

(DELETE) /api/beer/:ID elimina la cerveza con el id.
(PUT) /api/beer/:ID atualiza la cerveza con el id.

ENDPOINTS Type(categoria)

(GET) /api/type Devuelve todos los tipos 
(GET) /api/type/:ID devuelve un tipo en especifico

(POST) /api/type Agrega un nuevo tipo
(DELETE) api/type/:ID elimina un tipo de cerveza determinado

(PUT) /api/type/:ID edita un tipo de cerveza determinado.
	EJ:    /api/type/4
		{
		"tipo": "EDITADA",
        	"descripcion": "Del mundo a tu paladar, las cervezas de alrededor del globo."
		}
	actualiza el nombre de tipo con id 4 a "EDITADA"




	
