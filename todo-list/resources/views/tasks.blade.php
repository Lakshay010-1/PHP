<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>

    @for ($i = 0; $i < count($list); $i++)
        <a href="{{route('tasks.show',$i)}}">{{ $list[$i] }}</a>
    @endfor

</body>

</html>
