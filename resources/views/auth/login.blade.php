<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{asset('img/imprisol.jpg')}}" style="width: 100%;height: 300px; position: center">
                        </div>
                        <div class="col-md-8">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Bienvenido de Vuelta!</h1>
                                </div>
                                <form method="POST" action="{{ route('login') }}" onsubmit="return validar(this)" >
                                    @csrf

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                            <label id="lblemail" style="display:none;color:red;">Email invalido</label>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                            <label id="lblpass" style="display:none;color:red;">Contraseña invalida min 8 caracteres max 16</label>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                   

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>

<script>
            
            function validar(e) {
                expresionEmail = /\w+@\w+\.+[a-z]/;  
                //expresionTelefono = /\/;  
                
                var email = document.getElementById('email');
                var lblemail = document.getElementById('lblemail');
                    lblemail.setAttribute("style", "display: none;");

                var password = document.getElementById('password');
                var lblpass = document.getElementById('lblpass');
                    lblpass.setAttribute("style", "display: none;");
               
                var bool = true;
                
                if (!expresionEmail.test(email.value) || email.value.length === 0) {
                    lblemail.setAttribute("style", "display: initial;color:red;");
                    bool = false;
                }
                if (password.value.length < 8 || password.value.length > 16) {
                    lblpass.setAttribute("style", "display: initial;color:red;");
                    bool = false;
                }
                return bool;
            }
        
    </script>

</body>

</html>
