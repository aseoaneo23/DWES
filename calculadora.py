from operaciones import *

if __name__=='__main__':

    otra="s"
    op=""
    resultado=0
    while otra.lower() == "s":
        n1 = input("Introduzca el primer número: ")
        n2 = input("Introduzca el segundo número: ")

        print("""Operaciones disponibles:\n 
            1.-Suma\n
            2.-Resta\n
            3.-Multiplicación\n
            4.-División\n
            """)
        
        op = int(input("Introduzca una operación de las anteriores (1-4): "))

        if op!= 1 and op!= 2 and op!= 3 and op!=4 :
            print("¡Operación nó válida!")
        else:
            if op==1:
                resultado = suma(n1,n2)
            elif op==2:
                resultado = resta(n1,n2)
            elif op==3:
                resultado = multiplicacion(n1,n2)
            else:
                resultado = division(n1,n2)

            print("El resultado es: " + str(resultado))

        otra = input("Quiere reallizar otra operación? (s/n): ")
    print("Fin del programa.")