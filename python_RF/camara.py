import cv2 as cv

capturarvideo = cv.VideoCapture(0)

if not capturarvideo.isOpened():
    print("NO se encontro una camara")
    exit()

while True:
    Tipocamara,camara = capturarvideo.read()
    grises = cv.cvtColor(camara,cv.COLOR_BGR2GRAY)

    cv.imshow("camara",grises)
    if cv.waitKey(1)==ord("q"):
        break

capturarvideo.release()
cv.destroyAllWindows()