menu = """
Bienvenido al conversor de dinero a dolares 😊

1 - Colombia
2 - Mexico
3 - Ecuador

Elige una opcion: """

def conversores(mensaje,pais):
    
    pesos = input("cuantos pesos "+ pais +" tienes?: ")
    # pasar a decimales
    pesos = float(pesos)
    # valor dolar actual
    valor_dolar = mensaje
    dolares = pesos / valor_dolar
    # reducir, reodndear a 2 decimales
    dolares = round(dolares,2)
    dolares = str(dolares)
    # imprimir
    print("tienes $" + dolares + "dolares")


opcion = int(input(menu))

if opcion == 1:
    # pesos colombianos equivalentes al dolar
    dinero = 3800
    pais1 = "colombia"
    conversores(dinero,pais1)
elif opcion == 2:
    # pesos mexicanos equivalentes al dolar
    dinero = 200
    pais1 = "mexico"
    conversores(dinero,pais1)
else:
    # pesos ecuatorianos equivalentes al dolar
    dinero = 10
    pais1 = "ecuador"
    conversores(dinero,pais1)

