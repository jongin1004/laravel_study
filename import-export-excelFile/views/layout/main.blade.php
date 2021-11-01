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
                overflow: hidden;
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
            
            .logo_img {
                padding: 16px;
            }
            
            .header {
                position: absolute;
            }
        </style>
    </head>

    <body class="h-screen ">
        <div class="header">
            <div class="logo_img">                      
                <a href="/"><svg xmlns="http://www.w3.org/2000/svg"  width="110" height="34" viewBox="0 0 318.06 61.04"><defs><style>.cls-1{fill:#d01d1a}</style></defs><g id="レイヤー_2" data-name="レイヤー 2"><g id="レイヤー_1-2" data-name="レイヤー 1"><path class="cls-1" d="m301.42 13.45-7.54 47.18h16.64l7.54-47.18h-16.64zM206.24 9.87C215.06-1 202.69 0 202.69 0h-47.57l-1.78 11.21-13.4 4.15h-12.09l2.41-15h-16.64l-2.4 15h-7.06l-1.16 7.1h7l-.37 2.3-11.51 3.58H71.19s-6.54.07-7.93 8.7l-.36 2.2-3.39 1 4.31-26.84H44.39L40 41.46l-12.68-28H7.54L0 60.64h19.43l4.35-27.32L36.47 61l10.26-.38s6.87 0 10.18-7.81l3.93-.75c-1.24 8.62 5.21 8.56 5.21 8.56h27.81c1.39 0 2.84-1.64 3.18-3.58s-.62-3.5-2.07-3.5h-17.7l.51-3.12h25.34l1-6.62 2.53-.48-.63 3.93C103.89 61 114.22 61 114.22 61H128c1.39 0 2.85-1.71 3.18-3.57s-.67-3.57-2.06-3.57h-7.43l2.24-13.83 25.64-4.89-4.05 25.46h19.43l4.65-29.27 3.44-.62 13.54 29.89h21.12l-15.39-34Zm-27.57 19.58-3-6.75L45.29 49.94 170.4 11.2l-2.07-4.57h31.49ZM289.65 28.34h-31.1c-1.4 0-2.85 1.63-3.18 3.57s.61 3.57 2.06 3.57h21l-.5 3H259.1s-6.53.07-7.92 8.78l-.79 4.69c-1.33 8.78 5.2 8.71 5.2 8.71H291L294.78 37c1.4-8.66-5.13-8.66-5.13-8.66Zm-14.13 25.22h-8.71l1.28-8h8.71Z"/><path class="cls-1" d="M249 50.44 251.13 37c1.39-8.7-5.14-8.7-5.14-8.7h-28.92s-6.53.07-7.93 8.7L207 50.26l4.92 10.38h27.81c1.39 0 2.85-1.64 3.18-3.58s-.62-3.5-2.07-3.5h-20.57l.5-3.12Zm-22.95-15h8.71l-1.29 7.81h-8.71Z"/></g></g></svg></a>                
            </div>
        </div>
        <div class="flex flex-col justify-center items-center text-center h-screen">            
            @yield('content')
        </div>
    </body>
</html>