import sys
import face_recognition
import json

try:
    foto_ruta = sys.argv[1]
    img = face_recognition.load_image_file(foto_ruta)
    vector = face_recognition.face_encodings(img)

    if len(vector) > 0:
        # Convertimos a lista y luego a JSON para que PHP lo reciba limpio
        print(json.dumps(vector[0].tolist()))
    else:
        sys.exit(1) # No se detectó rostro
except Exception as e:
    print(str(e), file=sys.stderr)
    sys.exit(1)