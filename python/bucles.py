def run():
    limite = input('Escribe un limite: ')
    limite = int(limite)
    potenciador = input('Escribe una potencia del 1 al 9: ')
    potenciador = int(potenciador)

    contador = 0

    potencia = potenciador**contador
    while potencia < limite:
        print(str(potenciador) + ' elevado a ' + str(contador) + ' es igual a ' + str(potencia))
        contador = contador + 1
        potencia = potenciador**contador


if __name__ == '__main__':
    run()