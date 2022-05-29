<!DOCTYPE html>
<html lang="en">
<head>
    <title>Image uploading with Vue + Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="max-w-lg mx-auto mt-24">
        <h1 class="text-4xl font-bold text-center">Image uploader</h1>
    </div>

    <div id="app">

    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>