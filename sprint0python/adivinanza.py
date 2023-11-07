adiv_dicc = {
    'op1':'Yo-yo',
    'op2':'Pelota',
    'op3':'Peonza',
    'opc':'a'
}

print("Esto es un juego de adivinanza")
def comprobarAdivinanza(op):
    if op == adiv_dicc['opc']:
        print('Acertaste!')
    else:  
        print('Fallaste!')

print("¿Cuál es el jueguete más egoísta?")
print("a)" + adiv_dicc['op1'])
print("b)" + adiv_dicc['op2'])
print("c)" + adiv_dicc['op3'])

op = input('Opción elegida: ')
comprobarAdivinanza(op)