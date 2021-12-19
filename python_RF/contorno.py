import cv2
imagen = cv2.imread('contorno.jpg')
#umbral = blanco y negro
grises = cv2.cvtColor(imagen,cv2.COLOR_BGR2GRAY)

u,umbral = cv2.threshold(grises,100,255,cv2.THRESH_BINARY)

contorno,jerarquia = cv2.findContours(umbral,cv2.RETR_LIST,cv2.CHAIN_APPROX_SIMPLE)

cv2.drawContours(imagen,contorno,-1,(251,60,50),3)

#mostrar
cv2.imshow('imagen',imagen)
#cv2.imshow('imagen',umbral)
print(u)
#deja ver la imagen sin que se cierre
cv2.waitKey(0)
#cv2.destroyAllWindows()