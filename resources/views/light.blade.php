<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Light Switch</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>Light Control</h2>

    <div>
        <p>Status: <span id="light-state">{{ $light->state ? 'ON' : 'OFF' }}</span></p>
        <button id="toggle-btn">Toggle Light</button>
    </div>

    <script>
        $(document).ready(function() {
            $('#toggle-btn').click(function() {
                $.post('/light/toggle', {
                    _token: "{{ csrf_token() }}"
                }, function(data) {
                    $('#light-state').text(data.state ? 'ON' : 'OFF');
                });
            });
        });
    </script>
</body>
</html>
