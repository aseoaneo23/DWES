from django.shortcuts import render
from django.http import HttpResponse,JsonResponse
from .models import Tjuegos
# Create your views here.

def pagina_de_prueba(request):
	return HttpResponse("<h1>HOLA</h1>");

def devolver_juegos(request):
	lista = Tjuegos.objects.all()
	respuesta_final = []
	for fila_sql in lista:
		diccionario = {}
		diccionario['id']=fila_sql.id
		diccionario['nombre']=fila_sql.nombre
		diccionario['url_imagen']=fila_sql.url_imagen
		diccionario['estudio']=fila_sql.estudio
		diccionario['genero']=fila_sql.género
		respuesta_final.append(diccionario)
	return JsonResponse(respuesta_final, safe=False)
