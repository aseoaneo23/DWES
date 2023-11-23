from django.shortcuts import render
from django.http import HttpResponse,JsonResponse
from .models import Tjuegos
from .models import Tcomentarios
from django.views.decorators.csrf import csrf_exempt
import json
# Create your views here.

#Función que muestra un h1 por pantalla 
def pagina_de_prueba(request):
	return HttpResponse("<h1>HOLA</h1>");

#Función que devuelve un array el cuál contiene objetos con todas las columnas
# de la base de datos. 
def devolver_juegos(request)
#En lista se guardan todos los datos de la base de datos juegos:
	lista = Tjuegos.objects.all()
	respuesta_final = []
#Bucle que por cada fila de datos de la base cree un objeto y lo añade al array
#respuesta_final
	for fila_sql in lista:
		diccionario = {}
		diccionario['id']=fila_sql.id
		diccionario['nombre']=fila_sql.nombre
		diccionario['url_imagen']=fila_sql.url_imagen
		diccionario['estudio']=fila_sql.estudio
		diccionario['genero']=fila_sql.género
		respuesta_final.append(diccionario)
	return JsonResponse(respuesta_final, safe=False)

#Función que devuelve un objeto JSON con el id que se le solicita por URL 
def devolver_juego_por_id(request,id_solicitado):
#Se guradan datos en juego de el id solicitado
	juego = Tjuegos.objects.get(id = id_solicitado)
#Se guardan en comentarios los elementos de la tabla Tcomentarios asociados con 
#el mismo id relacionado con la Foreign Key.
	comentarios = juego.tcomentarios_set.all()
	lista_comentarios = []
#Bucle que crea un objeto por cada comentario y para el juego solicitado
	for fila_comentario_sql in comentarios:
		diccionario ={}
		diccionario['id'] = fila_comentario_sql.id
		diccionario['comentario'] = fila_comentario_sql.comentario
		lista_comentarios.append(diccionario)
	resultados = {
		'id': juego.id,
		'nombre': juego.nombre,
		'url_imagen': juego.url_imagen,
		'estudio': juego.estudio,
		'género': juego.género,
		'comentarios': lista_comentarios
	}
	return JsonResponse(resultados, json_dumps_params={'ensure_ascii':False})

@csrf_exempt
#Función que en caso de recibir una petición POST, introduce los datos de comentario.
def guardar_comentario(request, id_juego):
	if request.method != 'POST':
		return None
#Cargamos la petición
	json_peticion = json.loads(request.body)
#Guardamos en comentario la tabla Tcomentarios
	comentario = Tcomentarios()
#guardamos en la columna comentario el comentario pasado por el POST
	comentario.comentario = json_peticion['nuevo_comentario']
#guardamos en el id de juego el id correspondiente
	comentario.juego = Tjuegos.objects.get(id = id_juego)
#Guardamos los cambios de la inserción
	comentario.save()
	return JsonResponse({"status":"ok"}) 
