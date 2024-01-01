<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webcam Capture</title>
</head>
<body>

<div id="camera">

</div>
<button onclick="takeimage()">Capture</button>
<div id="results"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Webcam.set({
            height: 350,
            width: 350,
            image_format: 'jpeg',
            jpeg_quality: 100
        });

        Webcam.attach("#camera");
        window.takeimage = function takeimage() {
            Webcam.snap(function (data_uri) {
                document.getElementById("results").innerHTML = '<img src="' + data_uri + '"/>';

                var formData = new FormData();
                formData.append('imageData', data_uri);

                var xhr = new XMLHttpRequest();

                xhr.open('POST', 'backend.php', true);

                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4) {  
                        if (xhr.status == 200) {
                            console.log("Image sent successfully");
                        } else {
                            console.log("Error sending image. Status: " + xhr.status);
                        }
                    }
                };
                xhr.send(formData);
            });
        };
    });
</script>

</body>
</html>
