adiv_dicc = {
    'adivinanza':'¿Cuál es el jueguete más egoísta?',
    'ops':'a) Pelota \nb) Yo-yo \nc) Peonza',
    'oc':'a'
} #Instaurmaos el diccionario

print("Esto es un juego de adivinanza")

def comprobarAdivinanza(op):#Función que comprueba la entrada y acierto/fallo
    if op == 'a' or op == 'b' or op =='c':
        if op == adiv_dicc['oc']:
            print('Acertaste!')
        else:  
            print('Fallaste!')
    else:
        print("La opción debe ser una de las posibles (a,b,c)")

print(adiv_dicc['adivinanza'])
print(adiv_dicc['ops'])


op = input('Opción elegida: ')#Aceptamos la entrada del usuario


comprobarAdivinanza(op)