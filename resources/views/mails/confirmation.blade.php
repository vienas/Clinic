<!DOCTYPE html>
<html>
<head>
    <title>Potwierdzenie rejestracji</title>
</head>
<body>
    <h1>Witaj {{ $clinic->name }}!</h1>
    <h2><strong>Termin wizyty w Sport Klinice</strong></h2>

    <p><strong>Imię i nazwisko:</strong> {{ $clinic->name }}</p>
    <p><strong>Data wizyty:</strong> {{ \Carbon\Carbon::parse($clinic->date)->format('d-m-Y') }}</p>
    <p><strong>Numer telefonu:</strong> {{ $clinic->phone }}</p>
    <p><strong>Adres e-mail:</strong> {{ $clinic->mail }}</p>
    <p><strong>Lekarz:</strong> {{ $clinic->doctor }}</p>
</body>
</html>

