nombre1 = input("Nombre 1: ")
nombre2 = input("Nombre 2: ")

if nombre1[0] == nombre2[0]:
    print(f"Tiene semejanza al principio con la letra {nombre1[0]}")
elif nombre1[-1] == nombre2[-1]:
    print(f"Tiene semejanza al final con la letra {nombre1[-1]}")
else:
    print("NO hay semejanza")