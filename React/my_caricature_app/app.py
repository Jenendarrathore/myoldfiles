# app.py
from flask import Flask, request, jsonify
import cv2
import numpy as np

app = Flask(__name__)

@app.route('/caricature', methods=['POST'])
def caricature():
    # Check if an image file is part of the request
        if 'image' not in request.files:
            return jsonify({'error': 'No image file provided'}), 400

        file = request.files['image'].read()
        nparr = np.frombuffer(file, np.uint8)
        image = cv2.imdecode(nparr, cv2.IMREAD_COLOR)
        
     # Check if the image was successfully decoded
        if image is None:
            return jsonify({'error': 'Unable to decode image'}), 400

        # Apply bilateral filter to smooth the image while preserving edges
        filtered_image = cv2.bilateralFilter(image, d=9, sigmaColor=75, sigmaSpace=75)

        # Convert the image to grayscale and apply median blur
        gray_image = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
        gray_blurred = cv2.medianBlur(gray_image, 7)

        # Detect edges in the grayscale image
        edges = cv2.adaptiveThreshold(gray_blurred, 255,
                                     cv2.ADAPTIVE_THRESH_MEAN_C,
                                     cv2.THRESH_BINARY, 9, 10)

        # Convert edges to a 3-channel image
        edges_colored = cv2.cvtColor(edges, cv2.COLOR_GRAY2BGR)

        # Enhance colors by converting to HSV and increasing saturation
        hsv_image = cv2.cvtColor(filtered_image, cv2.COLOR_BGR2HSV)
        hsv_image[..., 1] = cv2.add(hsv_image[..., 1], 50)  # Increase saturation
        enhanced_image = cv2.cvtColor(hsv_image, cv2.COLOR_HSV2BGR)

        # Combine the enhanced image with the edge mask
        caricature = cv2.bitwise_and(enhanced_image, edges_colored)

        # Enhance the contrast and brightness further
        caricature = cv2.convertScaleAbs(caricature, alpha=1.5, beta=30)

        # Encode the processed image as PNG and send it back
        _, buffer = cv2.imencode('.png', caricature)
        return buffer.tobytes(), 200, {'Content-Type': 'image/png'}

    

if __name__ == '__main__':
    app.run(port=5000)  # You can choose any port that's available
    