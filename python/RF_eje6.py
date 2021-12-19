numero1 = int(input("Primer numero: "))
numero2 = int(input("Segundo numero: "))
numero3 = int(input("Tercer numero: "))

if numero1 >= numero2 and numero1 >= numero3:
    print(f"El mayor es {numero1}")
elif numero2 >= numero1 and numero2 >= numero3:
    print(f"El mayor es {numero2}")
elif numero3 >= numero2 and numero3 >= numero1:
    print(f"El mayor es {numero3}")
