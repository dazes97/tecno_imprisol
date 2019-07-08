@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h2>Registrar Administrativo</h2>
                <form method="post" action="{{route('administratives.store')}}" onsubmit="return validar(this)">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <label id="lblname" style="display:none;color:red;">Nombre requirido</label>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                        <label id="lblemail" style="display:none;color:red;">Email invalido</label>
                    </div>
                    <div class="form-group">
                        <label for="contraseña">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <label id="lblpass" style="display:none;color:red;">Contraseña invalida min 8 caracteres max 16</label>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="number" class="form-control" id="phone" name="phone">
                        <label id="lblphone" style="display:none;color:red;">Telefono invalido</label>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha de Admision</label>
                        <input type="date" class="form-control" id="date" name="date_admission">
                        <label id="lbldate" style="display:none;color:red;">Fecha no valida</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>

    </div>
    

    <script>
            
            function validar(e) {
                expresionEmail = /\w+@\w+\.+[a-z]/;  
                //expresionTelefono = /\/;  
                var name = document.getElementById('name');
                var lblname = document.getElementById('lblname');
                    lblname.setAttribute("style", "display: none;");
                var email = document.getElementById('email');
                var lblemail = document.getElementById('lblemail');
                    lblemail.setAttribute("style", "display: none;");
                var password = document.getElementById('password');
                var lblpass = document.getElementById('lblpass');
                    lblpass.setAttribute("style", "display: none;");
                var phone = document.getElementById('phone');
                var lblphone = document.getElementById('lblphone');
                    lblphone.setAttribute("style", "display: none;");
                var date = document.getElementById('date');
                var lbldate = document.getElementById('lbldate');
                    lbldate.setAttribute("style", "display: none;");
                var bool = true;
                if (name.value.length == 0) {
                    lblname.setAttribute("style", "display: initial;color:red;");
                    //alert('Rellena el campo nomnbre');
                    bool = false;
                }
                if (!expresionEmail.test(email.value) || email.value.length === 0) {
                    lblemail.setAttribute("style", "display: initial;color:red;");
                    bool = false;
                }
                if (password.value.length < 8 || password.value.length > 16) {
                    lblpass.setAttribute("style", "display: initial;color:red;");
                    bool = false;
                }
                if (phone.value.length === 0) {
                    lblphone.setAttribute("style", "display: initial;color:red;");
                    bool = false;
                }
                if (date.value.length === 0) {
                    lbldate.setAttribute("style", "display: initial;color:red;");
                    bool = false;
                }
                return bool;
            }
        
    </script>
@endsection