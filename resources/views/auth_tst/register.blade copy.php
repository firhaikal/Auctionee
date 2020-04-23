<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <title>Login</title>
    <style>
        html, body {
            height: 100%;
            width: 100%;
            background-color: #EEF0F2;
        }
    </style>
</head>
<body>
    <div class="container-fluid h-100">
        <div class="row h-100 w-100">
            <div class="col p-5" style="background-color: #7184B3">
                @include('includes.side')
            </div>
            <div class="col align-self-center">
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-8">
                        <h1>Sign in</h1>
                        <div class="col-xl-12">
                            <form action="" method="post">
                                <div class="form-group">
                                  <label for="fullname">Full Name</label>
                                  <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                                </div>
                                <div class="form-group">
                                  <label for="username">Username</label>
                                  <input type="text"
                                    class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                                </div>
                                <div class="form-group">
                                  <label for="password">Password</label>
                                  <input type="password" class="form-control" name="" id="" placeholder="">
                                </div>
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="row">
        @include('includes.footer')
    </footer>
</body>
</html>