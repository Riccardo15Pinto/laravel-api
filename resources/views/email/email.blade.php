<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>Nuova E-Mail</h1>
        <div>
            <ul>
                <li>Oggetto: {{ $object }}</li>
                <li>E-mail: {{ $email }}</li>
                <li>Testo:
                    <p>
                        {{ $content }}
                    </p>
                </li>
            </ul>
        </div>
    </div>
</body>

</html>
