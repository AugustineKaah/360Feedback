<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="store" method="post">
    <label for="value"></label>
    <input type="text" name="core_value" id="core_value">
    <input type="submit" value="Submit">

    <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form>
</body>
</html>