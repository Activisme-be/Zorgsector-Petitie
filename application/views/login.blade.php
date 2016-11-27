<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content={{ $this->config->item('description') }}"">
        <meta name="author" content="{{ $this->config->item('author') }}">

        <title>{{ $this->config->item('name') }}: {{ $this->lang->line('title') }}</title>

        {{-- Bootstrap core CSS --}}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        {{-- IE10 viewport hack for Surface/desktop Windows 8 bug --}}
        <link href="/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
        <link href="/assets/css/signin.css" rel="stylesheet">

        {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <form method="POST" action="{{ base_url('/verifylogin') }}" class="form-signin">
                @if (validation_errors())
                    <div class="alert alert-danger">
                        <?php echo validation_errors(); ?>
                    </div>
                @endif

                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" name="username" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>
        </div>{{-- /container --}}


        {{-- IE10 viewport hack for Surface/desktop Windows 8 bug --}}
        <script src="/assets/js/ie10-viewport-bug-workaround.js"></script>

    </body>
</html>