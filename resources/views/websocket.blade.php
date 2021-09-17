<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel + Websocket</title>
</head>
<body>
    <input type="text" id="log-msg">
    <button id="bttn">Enviar log</button>

    <h2>Logs from websocket:</h2>

    <ul id="logs"></ul>

    <script src="{{ mix('/js/websocket.js') }}" defer></script>
</body>
</html>
