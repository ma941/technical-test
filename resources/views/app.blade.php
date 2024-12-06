<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mohsin Ali - Technical</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div id="app" data-page="{{ json_encode($page) }}"></div>
    @routes
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>