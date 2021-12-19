from cv2 import cv2
import numpy as np

def ordenarpunto(puntos):
    n_puntos = np.concatenate([puntos[0],puntos[1],puntos[2],puntos[3]]).tolist()
    #1-1 es 0
    #0
    y_order = sorted(n_puntos , key=lambda n_puntos:n_puntos[1])
    #1
    x1_order = y_order[:2]
    x1_order = sorted(x1_order, key=lambda x1_order:x1_order[0])
    #2
    x2_order = y_order[2:4]
    x2_order = sorted(x2_order, key=lambda x2_order:x2_order[0])

    return[x1_order[0], x1_order[1], x2_order[0], x2_order[1]]

def alineamiento(imagen , ancho , alto):
    imagen_alineada = None
    grises = cv2.cvtColor(imagen, cv2.COLOR_BGR2GRAY)
    tipoU,umbral = cv2.threshold(grises,150,255,cv2.THRESH_BINARY)
    #cv2.imshow("umbral", umbral)
    contorno = cv2.findContours(umbral, cv2.RETR_EXTERNAL , cv2.CHAIN_APPROX_SIMPLE)[0]
    contorno = sorted(contorno,key=cv2.contourArea,reverse=True)[:1]
    for c in contorno:
        epsilon = 0.01*cv2.arcLength(c,True)
        approx = cv2.approxPolyDP(c,epsilon,True)
        if len(approx) == 4:
            #espacio de trabajo
            puntos = ordenarpunto(approx)
            puntos1 = np.float32(puntos)
            #x Y
            puntos2 = np.float32([0,0],[ancho,0],[0,alto],[ancho, alto])
            M = cv2.getPerspectiveTransform(puntos1,puntos2)
            imagen_alineada = cv2.warpPerspective(imagen, M , (ancho,alto))
    return imagen_alineada

capturar_video = cv2.VideoCapture(1)

while True:
    tipocamara , camara = capturar_video.read()
    if tipocamara == False:
        break
    imagen_A6 = alineamiento(camara, ancho= 480, alto = 640)
    if imagen_A6 is not None:
        puntos=[]
        imagen_gris = cv2.cvtColor(imagen_A6, cv2.COLOR_BGR2GRAY)
        gauss = cv2.GaussianBlur(imagen_gris,(5,5),1)
        _,umbral2 = cv2.threshold(gauss,0,255,cv2.THRESH_OTSU+cv2.THRESH_BINARY_INV)
        cv2.imshow("umbral 2",umbral2)
        contorno2, jerarquia2 = cv2.findContours(umbral2, cv2.RETR_EXTERNAL,cv2.CHAIN_APPROX_SIMPLE)[0]
        cv2.drawContours(imagen_A6,contorno2, -1, (255,0,0),2)
        suma1 = 0.0
        suma2 = 0.0
        suma3 = 0.0

        for c2 in contorno2:
            area = cv2.contourArea(c2)
            momentos = cv2.moments(c2)
            if (momentos["m00"] == 0):
                momentos["m00"]=1.0
            x= int(momentos["m10"]/momentos["m00"])
            y= int(momentos["m01"]/momentos["m00"])

            if area<12500 and area>12000:
                font = cv2.FONT_HERSHEY_SIMPLEX
                cv2.putText(imagen_A6,"1000 pesos",(x,y),font,0.75 ,(0,255,0),2)
                suma1 = suma1+1000
            
            if area<9500 and area>9000:
                font = cv2.FONT_HERSHEY_SIMPLEX
                cv2.putText(imagen_A6,"500 pesos",(x,y),font,0.75 ,(0,255,0),2)
                suma2 = suma1+500
            
            if area<8000 and area>7800:
                font = cv2.FONT_HERSHEY_SIMPLEX
                cv2.putText(imagen_A6,"50 pesos",(x,y),font,0.75 ,(0,255,0),2)
                suma3 = suma1+50
        total = suma1+suma2+suma3
        print("La suma de las monedas es",round(total,2))
        cv2.imshow("a6",imagen_A6)
    if cv2.waitKey(1) == ord('q'):
        break

capturar_video.release()
cv2.destroyAllWindows()

