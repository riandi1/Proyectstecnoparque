import cv2
import numpy as np

valorkernel = 3
valorgaus = 3

#lee la imagen
original = cv2.imread('monedas3.jpg')
#la pasa a grises
grises = cv2.cvtColor(original,cv2.COLOR_BGR2GRAY)
#la suaviza, desenfoque
gauss = cv2.GaussianBlur(grises,(valorgaus,valorgaus),0)
#canny reduce ruido
bordes = cv2.Canny(gauss,60,100)

kernel = np.ones((valorkernel,valorkernel) , np.uint8)
#cierre de los contornos
cierre = cv2.morphologyEx(bordes, cv2.MORPH_CLOSE,kernel)

contornos , jerarquia = cv2.findContours(cierre.copy(),cv2.RETR_EXTERNAL,cv2.CHAIN_APPROX_SIMPLE)
cv2.drawContours(original,contornos,-1,(0,0,255),2)
#mostrar
print("monedas encontradas: {}".format(len(contornos)))
cv2.imshow("hola",original)
cv2.waitKey(0)
