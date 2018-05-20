<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>
                        You were get letter
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="">Link #01. Click me</a></td>
                </tr>
                <tr>
                    <td><a href="">Link #02. Click me</a></td>
                </tr>
                <tr>
                    <td><img src="{{ route('open_letter') }}?openLetter={{ $openLetter }}" alt=""></td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
