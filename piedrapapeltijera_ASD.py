import random

# Función para verificar quién gana en función de las selecciones del usuario y de la máquina
def verificar_ganador(opcion_usuario, opcion_maquina):
    # Verifica si las selecciones son iguales, lo que resulta en un empate
    if opcion_usuario == opcion_maquina:
        return "Empate"
    # Verifica todas las combinaciones posibles en las que el usuario gana
    elif (opcion_usuario == 'piedra' and opcion_maquina == 'tijera') or \
         (opcion_usuario == 'papel' and opcion_maquina == 'piedra') or \
         (opcion_usuario == 'tijera' and opcion_maquina == 'papel'):
        return f"Ganaste, {opcion_usuario} vence a {opcion_maquina}" #f se usa para meter los valores de variables en texto entre llaves
    # Si no es empate y el usuario no gana, entonces la máquina gana
    else:
        return f"Perdiste, {opcion_maquina} vence a {opcion_usuario}"

# Función principal que maneja la lógica del juego
def jugar_juego():
    # Definir las opciones posibles para el juego
    opciones = ['piedra', 'papel', 'tijera']
    puntaje_usuario = 0
    puntaje_maquina = 0

    # Iniciar un bucle para 5 rondas
    for i in range(5):
        print(f"Ronda {i+1}")
        # Solicitar al usuario que elija una opción y convertir a minúsculas
        opcion_usuario = input("Elige tu jugada (piedra, papel, tijera): ").lower()
        # Verificar si la opción del usuario es válida
        if opcion_usuario not in opciones:
            print("Opción no válida. Por favor elige de nuevo.")
            continue #Salta el resto del bucle y comienza a una nueva iteración

        # Generar una selección aleatoria para la máquina
        opcion_maquina = random.choice(opciones)
        print(f"La máquina eligió {opcion_maquina}")
        # Verificar el resultado de la ronda y actualizar los puntajes en consecuencia
        resultado = verificar_ganador(opcion_usuario, opcion_maquina)

        # Mostrar el resultado de la ronda y actualizar los puntajes
        if resultado == "Empate":
            print("Es un empate. Esta ronda no contará.")
        else:
            print(resultado)
            if "Ganaste" in resultado:
                puntaje_usuario += 1
            else:
                puntaje_maquina += 1

    # Mostrar el mensaje final del juego
    print("¡Juego terminado!")
    if puntaje_usuario > puntaje_maquina:
        print("¡Felicidades! Ganaste el juego.")
    elif puntaje_usuario < puntaje_maquina:
        print("Perdiste el juego. ¡Buena suerte la próxima vez!")
    else:
        print("Es un empate. Nadie gana.")

# Ejecutar la función principal del juego si se ejecuta este archivo directamente
if __name__ == "__main__":
    jugar_juego()
