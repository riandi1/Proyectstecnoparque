numero1 = int(input("Primer numero: "))
numero2 = int(input("Segundo numero: "))

if numero1%2==0 and numero2%2==0:
    print("el numero 1 y 2 son pares")
elif numero1%2==0 and numero2%2!=0:
    print(f"el numero {numero1} es par y el {numero2} impar")
elif numero1%2!=0 and numero2%2==0:
    print(f"el numero {numero1} es impar y el {numero2} par")
else:
    print("ambos son impares")