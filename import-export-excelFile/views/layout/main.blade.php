<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>NetReal</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Kosugi&display=swap" rel="stylesheet">

        <style>
            body {
                background-color: #fce9e5;
                font-family: 'Kosugi', sans-serif;
            }

            #pagination p {
                display: none;
            }

            .ellipsis {
                display: inline-block; 
                width: 250px; 
                white-space: nowrap;
                overflow: hidden; 
                text-overflow: ellipsis;
            }            
        </style>
    </head>

    <body class="h-screen ">
        <div class="flex flex-col justify-center items-center text-center h-full">
            @yield('content')
        </div>
    </body>
</html>