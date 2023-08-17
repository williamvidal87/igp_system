
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('image/logo/norsu2.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('image/logo/norsu2.png') }}">
    <title>Login page | {{ config('app.name', 'Laravel') }}</title>
    
    
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet" type="text/css">
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <link href="css/nifty.min.css" rel="stylesheet">
    
    <link href="css/demo/nifty-demo-icons.min.css" rel="stylesheet">
    
    
    <link href="plugins/pace/pace.min.css" rel="stylesheet">
    <script src="plugins/pace/pace.min.js"></script>
    
    <link href="css/demo/nifty-demo.min.css" rel="stylesheet">

</head>


<body>
    <div id="container" class="cls-container">
        <div id="bg-overlay"></div>
        <div class="cls-content">
            <div class="cls-content-sm panel">
                <div class="panel-body">
                    <div class="mar-ver pad-btm">
                        <div>
                            <img src="image/logo/norsu2.png" style="width: 1in">
                            <h1 class="h3">NORSU-G IGP</h1>
                        </div>
                        <p>Sign In to your account</p>
                    </div>
                    
                    <x-jet-validation-errors class="mb-4" />
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <input type="email" id="email" class="form-control" placeholder="Email" name="email" :value="old('email')" required autofocus>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" name="password" required autocomplete="current-password">
                        </div>
                        <div class="checkbox pad-btm text-left">
                            <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox">
                            <label for="demo-form-checkbox">Remember me</label>
                        </div>
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Sign In</button>
                    </form>
                </div>
                <div class="pad-all">
                    {{-- @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="btn-link mar-rgt">Forgot password ?</a>
                    @endif --}}
                    <a href="register" class="btn-link mar-lft">Create a new account</a>
                    
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    
    <script src="js/jquery.min.js"></script>
    
    <script src="js/bootstrap.min.js"></script>
    
    <script src="js/nifty.min.js"></script>
    
    
    <script src="js/demo/bg-images.js"></script>
</body>
</html>
