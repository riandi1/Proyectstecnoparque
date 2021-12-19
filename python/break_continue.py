def run():
    # for contador in range(1000):
    #     if contador % 2 != 0:
    #         continue
    #     print(contador)


    # tope = int(input('Elija el tope'))


    # for i in range(10000):
    #     print(i)
    #     if i == tope:
    #         break


    # texto = input('escriba un texto: ')
    # for letra in texto:
    #     if letra == 'o':
    #         break
    #     print(letra)


    tope = int(input('elija un numero'))
    max = 10000
    contador = 0
    while tope <= max:
        print(contador)
        contador = contador + 1
        if contador == tope:
            break


if __name__ == '__main__':
    run()