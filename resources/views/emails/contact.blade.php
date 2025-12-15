<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hec Golf - Contact</title>
</head>

<body>
    
    @if( isset($name) )
        <p> {{ $name }} </p>
    @endif

    @if( isset($location) )
        <p> {{ $location }} </p>
    @endif

    @if( isset($date) )
        <p> {{ $date }} </p>
    @endif
    
    @if( isset($email) )
        <p> {{ $email }} </p>
    @endif

    @if( isset($phone) )
        <p> {{ $phone }} </p>
    @endif
    
    @if( isset($body) )
        {{ $body }}
    @endif
    
</body>

</html>