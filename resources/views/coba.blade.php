<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p id="pesan"></p>
    <script src="/js/app.js"></script>
    <script>
        window.Echo.channel("coords").listen("SendLocation", (event) => {
            console.log('berhasil');
            document.getElementById("pesan").innerHTML = event.message;
        });
    </script>
</body>
</html>
