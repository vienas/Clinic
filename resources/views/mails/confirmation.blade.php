<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="email-container">

        <div class="content">
            <h2 style="color: #00a80e;">Dzień dobry, {{ $clinic->name }}.</h2>

            <h3>Termin wizyty:</h3>
            <p><strong><span style="background-color: #adffb8;">{{ \Carbon\Carbon::parse($clinic->date)->format('d-m-Y') }}</span></strong></p>

            <h3>Lekarz prowadzący:</h3>
            <p><strong><span style="background-color: #adffb8;">{{ $clinic->doctor }}</span></strong></p>

            <p>Dziękujemy za skorzystanie z naszej rejestracji online. Czekamy na Ciebie w naszej klinice.</p>

        </div>
        <div class="footer">
            <p>Sport Klinika &copy; {{ \Carbon\Carbon::now()->year }}. Wszystkie prawa zastrzeżone.</p>
        </div>
    </div>
</body>
</html>