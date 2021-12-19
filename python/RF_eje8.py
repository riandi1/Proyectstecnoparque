#caja inicial
saldo = 2000
#textos de solicitudes
menu = """
Bienvenido al banco 😊

1 - Ingreso de saldo
2 - Retirar dinero
3 - Mostrar dinero
4 - Salir

Elige una opcion: """

#1
op1 = """
¿Cuanto es el valor a ingresar?
"""
new="""
El nuevo saldo es:
"""

#2
op2 = """
¿Cuanto es el valor a Retirar?
"""
dnsaldo = """
Saldo Insuficiente.
"""

#4
op4 = """
Gracias por todo, Lindo dia.
"""

#5
op5 = """
Numero no valido.
"""

#opcion traida por el usuario
opcion = int(input(menu))
#condiciones

if opcion == 1:
    ingreso = float(input(op1))
    saldo += ingreso
    print(new , saldo , op4)
elif opcion == 2:
    retirar = float(input(op2))
    if retirar > saldo:
        print(dnsaldo)
    else:
        saldo -= retirar
        print(new , saldo , op4)
elif opcion == 3:
    print(saldo)
elif opcion == 4:
    print(op4)
else:
    print(op5)