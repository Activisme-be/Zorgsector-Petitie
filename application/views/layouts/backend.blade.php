<!DOCTYPE html>
<html lang="nl">
    <head>
        <title>{{ $this->lang->line('title') }}: {{ $this->config->item('name') }}</title>

        {{-- Meta tags --}}
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{ $this->config->item('description') }}">
        <meta name="author" content="{{ $this->config->item('author') }}">

        {{-- Stylesheets --}}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/css/custom.css">
    </head>
    <body class="front-end">
        @include('layouts/partials/navbar')

        <div class="container">
            @yield('content')
        </div>

        {{-- JavaScript --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>