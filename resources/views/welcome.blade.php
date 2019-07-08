<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IMPRISOL S.R.L. | Inicio</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('webpage/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('webpage/css/modern-business.css')}}" rel="stylesheet">
    

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-company-color fixed-top">
      <div class="container">
        <a class="navbar-brand .bg-color-letter-nav" href="/">
        <img src="./images/profile_180x180.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Imprisol S.R.L.
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/contact">Contacto</a>
            </li>
            <li>
              <a class="nav-link" href="/about">Quienes Somos</a>
            </li>
            <li>
                <a class="nav-link" href="/login">Sistema</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('{{asset('webpage/images/slider1.jpg')}}')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Venta al por mayor y menor</h3>
              <p>Equipos de impresion de la mas alta calidad</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('{{asset('webpage/images/slider2.jpg')}}')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Distribuido Autorizado Epson</h3>
              <p>Equipos certificados con garantia oficial en Bolivia</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('{{asset('webpage/images/slider3.jpg')}}')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Venta de accesorios y repuestos originales para equipos de impresion</h3>
              <p>Accesorios para Epson, Canon, etc.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Atras</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Siguiente</span>
        </a>
      </div>
    </header>

    <!-- Page Content -->
    <div class="container">
        <br>
      <div class="container">
      <!-- Features Section -->
      <div class="row">
        <div class="col-lg-6">
          <h2 style="text-align: center;">IMPRISOL S.R.L.</h2>
          <h6><strong>IMPRISOL S.R.L. </strong>es representante exclusivo para Bolivia de:</h3>
          <p style="text-align: justify;">EPSON y CANON Bolivia representante exclusivo con garantia oficial en Bolivia
          </p>
        </div>
        <div class="col-lg-6">
          <img id="myImg" class="img-fluid rounded" src="{{asset('webpage/images/oferta.jpg')}}" alt="">
          
          <!-- The Modal -->
          <div id="myModal" class="modal">
          <!-- The Close Button -->
          <span class="close">&times;</span>
          <!-- Modal Content (The Image) -->
          <img class="modal-content" id="img01">
          <!-- Modal Caption (Image Text) -->
          <div id="caption"></div>
          </div>


        </div>
      </div>
      <br>
      <h3 style="text-align: center;">PONTE EN CONTACTO CON NOSOTROS</h3>
      <h6 style="text-align: center">ATENCION AL CLIENTE</h6>
      <!-- /.row -->
      <hr>
      <!-- Call to Action Section -->
      <div class="row mb-6">
        <div class="col-md-6">
          <a class="btn btn-lg btn-secondary btn-block" style="background: #3b5998" href="https://www.facebook.com/ImprisolEpson/" target="_black">Facebook</a>
          <br>
        </div>
        <div class="col-md-6">
          <a class="btn btn-lg btn-secondary btn-block" style="background: #25D366" href="https://wa.me/78066791" target="_black">Whatsapp</a>
          <br>
        </div>
      </div>

      </div>
      <!-- end container of row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; IMPRISOL S.R.L. 2019</p>
        
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('webpage/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('webpage/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- script para el zoom de la imagen -->
    <script>
      // Get the modal
      var modal = document.getElementById('myModal');
      // Get the image and insert it inside the modal - use its "alt" text as a caption
      var img = document.getElementById('myImg');
      var modalImg = document.getElementById("img01");
      var captionText = document.getElementById("caption");
      img.onclick = function(){
      modal.style.display = "block";
      modalImg.src = this.src;
      captionText.innerHTML = this.alt;
      }
      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];
      // When the user clicks on <span> (x), close the modal
      span.onclick = function() { 
        modal.style.display = "none";
      } 
      document.onkeydown = function(evt) {
      evt = evt || window.event;
      if (evt.keyCode == 27) {
        modal.style.display = "none";
      }
      };
    </script>

  </body>

</html>
