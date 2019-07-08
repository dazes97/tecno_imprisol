@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h2>Registrar Proveedor</h2>
                <form method="post" action="{{route('providers.store')}}" onsubmit="return validar(this)">
                    @csrf
                    <div class="form-group">
                        <label for="Codigo">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                        <label id="lblemail" style="display:none;color:red;">Email no valido</label>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Contraseña</label>
                        <input type="password" class="form-control" id="password" password="name">
                        <label id="lblpass" style="display:none;color:red;">Contraseña invalida max 8 carac min 16</label>
                    </div>
                    <div class="form-group">
                        <label for="Codigo">Codigo</label>
                        <input type="number" class="form-control" id="code" name="code">
                        <label id="lblcode" style="display:none;color:red;">Codigo requerido</label>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <label id="lblname" style="display:none;color:red;">Nombre requerido</label>
                    </div>
                    <div class="form-group">
                        <label for="Telefono">Telefono</label>
                        <input type="number" class="form-control" id="phone" name="phone">
                        <label id="lblphone" style="display:none;color:red;">Telefono requerido</label>
                    </div>
                    <div class="form-group">
                        <label for="Direccion">Direccion</label>
                        <input type="text" class="form-control" id="address" name="address">
                        <label id="lbladdress" style="display:none;color:red;">Direccion requerida</label>
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
                var code = document.getElementById('code');
                var lblcode = document.getElementById('lblcode');
                    lblcode.setAttribute("style", "display: none;");
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
                var address = document.getElementById('address');
                var lbladdress = document.getElementById('lbladdress');
                    lbladdress.setAttribute("style", "display: none;");
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
                if (address.value.length === 0) {
                    lbladdress.setAttribute("style", "display: initial;color:red;");
                    bool = false;
                }
                if (code.value.length === 0) {
                    lblcode.setAttribute("style", "display: initial;color:red;");
                    bool = false;
                }
                return bool;
            }
        
    </script>
@endsection