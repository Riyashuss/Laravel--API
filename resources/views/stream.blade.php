<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Light Switch</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<video id="laravel-stream" autoplay playsinline>
  <source src="{{ url('/esp32-stream') }}" type="video/mp4">
</video>
</body>
</html>
