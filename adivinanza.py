import random
if __name__ =="__main__":

    punt =0 #Variable de la puntuación

    adiv1_dicc = {
        'adivinanza':'¿Cuál es el jueguete más egoísta?',
        'ops':'a) Pelota \nb) Yo-yo \nc) Peonza',
        'oc':'b'
    }
    #Instauramos el diccionario 1

    adiv2_dicc = {
        'adivinanza':'Largo largero, Martín Caballero, sin patas ni manos y corre ligero',
        'ops':'a) El autobús \nb) El coche \nc) El tren',
        'oc':'c'
    } #Instauramos el diccionario 2


    adiv3_dicc = {
        'adivinanza':'Corren más que los minutos, pero nunca llegan los primeros.',
        'ops':'a) Las horas \nb) Las agujas \nc) Los segundos',
        'oc':'c'
    } #Instauramos el diccionario 2


    dicclist= [adiv1_dicc, adiv2_dicc, adiv3_dicc]

    adivs = random.sample(dicclist,2) #Selecciona dos elementos aleatorios de el objeto que pasemos.

    print("Esto es un juego de adivinanza")
        #Mostramos adivinanzas
    for i in adivs:
            print(i['adivinanza'])
            print(i['ops'])
            op = input('Opción elegida: ')#Aceptamos la entrada del usuario
            if op == 'a' or op == 'b' or op =='c':
                if op == i['oc']:
                    print('Acertaste!')
                    punt+=10
                else:  
                    print('Fallaste!')
                    punt -=5
            else:
                print("La opción debe ser una de las posibles (a,b,c)")
    print("Puntuación: "+str(punt))
