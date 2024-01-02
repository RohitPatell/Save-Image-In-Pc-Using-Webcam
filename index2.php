<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webcam Capture with Frame</title>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

    <style>
        #camera-container {
            position: relative;
            width: 500px;
        }

        #frame {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <div id="camera-container">
        <div id="camera" style="background-color: pink;"></div>
        <div id="frame-container">
            <img id="frame" src="images/Option-1.png" alt="Frame">
        </div>
    </div>
    <button onclick="takeImage()">Capture</button>
    <div style="width: 500px;" id="result"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Webcam.set({
                height: 400,
                width: 400,
                image_format: 'png',
                jpeg_quality: 90
            });

            Webcam.attach("#camera");
        });

        function takeImage() {
            Webcam.snap(function(data_uri) {
                var resultContainer = document.getElementById("result");
                resultContainer.innerHTML = '<div id="camera-container">' +
                    '<img id="captured-image" src="' + data_uri + '" alt="Captured Image">' +
                    '<img id="frame" src="images/Option-1.png" alt="Frame">' +
                    '</div>';

                var resultDiv = document.getElementById('result');
                html2canvas(resultDiv).then(function(canvas) {
                    var imageData = canvas.toDataURL('image/png');

                    fetch('backend2.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: 'imageData=' + encodeURIComponent(imageData),
                        })
                        
                });
            });
        }
    </script>
</body>

</html>