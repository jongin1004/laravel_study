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
    </style>
</head>

<body class="h-screen ">
    <div class="flex flex-col justify-center items-center text-center h-full">
        <div class="flex-auto flex items-center">
            <span>選考の機会を頂きまして誠にありがとうございます。</span> 
        </div>

        <div class="flex-auto">
            <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                    <div class="custom-file text-left">
                        <input type="file" name="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>

                <button class="btn btn-primary mb-2">アップロード</button>
                <a class="btn btn-success mb-2" href="{{ route('file-export') }}">ダウンロード</a>
                <a class="btn btn-success mb-2" href="{{ route('file-reset') }}">データリセット</a>
            </form>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ $message }}</strong>
        </div>
    @endif
</body>

</html>