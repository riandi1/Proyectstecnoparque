def run():
    numero = int(input("Number of: "))
    if es_primo(numero):
        print('Es primo')
    else:
        print('No es primo')


def es_primo(numero):
    contador = 0

    for i in range (1, numero + 1):
        if i == 1 or i == numero + 1:
            continue
        if numero % 1 == 0:
            contador += 1
    if contador == 0:
        return False
    else:
        return True


if __name__ == "__main":
    run()