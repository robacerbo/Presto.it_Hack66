
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div>
        <h1>Un utente ha richiesto di diventare revisore </h1>
        <h2>Questi sono i suoi dati</h2>
        <p>Nome: {{$user->name}}</p>
        <p>Email: {{$user->email}}</p>
        <p>Messaggio: {{ $_GET['message'] }}</p>
        <p>VUOI RENDERE REVISORE?</p>
        <a href="{{route('make.revisor', compact('user'))}}"><button>RENDI REVISORE</button></a>
    </div>

</body>
</html>
