<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestiones Digitales</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
          padding-top: 3rem;
          padding-bottom: 3rem;
          color: #5a5a5a;
        }


        /* CUSTOMIZE THE CAROUSEL
        -------------------------------------------------- */

        /* Carousel base class */
        .carousel {
          margin-bottom: 4rem;
        }
        /* Since positioning the image, we need to help out the caption */
        .carousel-caption {
          bottom: 3rem;
          z-index: 10;
        }

        /* Declare heights because of positioning of img element */
        .carousel-item {
          height: 32rem;
        }
        .carousel-item > img {
          position: absolute;
          top: 0;
          left: 0;
          min-width: 100%;
          height: 32rem;
        }


        /* MARKETING CONTENT
        -------------------------------------------------- */

        /* Center align the text within the three columns below the carousel */
        .marketing .col-lg-4 {
          margin-bottom: 1.5rem;
          text-align: center;
        }
        .marketing h2 {
          font-weight: 400;
        }
        /* rtl:begin:ignore */
        .marketing .col-lg-4 p {
          margin-right: .75rem;
          margin-left: .75rem;
        }
        /* rtl:end:ignore */


        /* Featurettes
        ------------------------- */

        .featurette-divider {
          margin: 5rem 0; /* Space out the Bootstrap <hr> more */
        }

        /* Thin out the marketing headings */
        .featurette-heading {
          font-weight: 300;
          line-height: 1;
          /* rtl:remove */
          letter-spacing: -.05rem;
        }


        /* RESPONSIVE CSS
        -------------------------------------------------- */

        @media (min-width: 40em) {
          /* Bump up size of carousel content */
          .carousel-caption p {
            margin-bottom: 1.25rem;
            font-size: 1.25rem;
            line-height: 1.4;
          }

          .featurette-heading {
            font-size: 50px;
          }
        }

        @media (min-width: 62em) {
          .featurette-heading {
            margin-top: 7rem;
          }
        }
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }

        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
      </style>
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Gestiones Digitales</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>
            @if (Route::has('login'))
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item">
                            <a href="{{ url('/home') }}" class="nav-link">Home</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Iniciar Sesión</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-link">Registrarte</a>
                            @endif
                        </li>
                    @endauth
                </ul>
            @endif
          </div>
        </div>
      </nav>
    </header>
    <main>
      <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ URL::asset('images/alejandra.jpg') }}" alt="" class="bd-placeholder-img" width="100%" height="100%" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
          </div>
          <div class="carousel-item">
            <img src="{{ URL::asset('images/a.jpg') }}" alt="" class="bd-placeholder-img" width="100%" height="100%" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
          </div>
          <div class="carousel-item">
            <img src="{{ URL::asset('images/champoton.jpg') }}" alt="" class="bd-placeholder-img" width="100%" height="100%" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Siguiente</span>
        </button>
      </div>
      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->
      <div class="container marketing">
        <!-- Three columns of text below the carousel -->
        <div class="row">
          <div class="col-lg-4">
            <img src="{{ URL::asset('images/layda.jpg') }}" alt="" class="bd-placeholder-img rounded-circle" width="150" height="150" role="img">
            <h2>Layda Sansores San Román</h2>
            <p>Gobernadora de Campeche</p>
            <p>
              <a class="btn btn-secondary" href="https://www.facebook.com/LaydaSansores" target="_blank"><i class='bx bxl-facebook'></i></a>
              <a class="btn btn-secondary" href="https://www.instagram.com/laydasansores/" target="_blank"><i class='bx bxl-instagram'></i></a>
              <a class="btn btn-secondary" href="https://twitter.com/LaydaSansores" target="_blank"><i class='bx bx-x'></i></a>
              <a class="btn btn-secondary" href="https://layda.com.mx/" target="_blank"><i class='bx bx-world'></i></a>
            </p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img src="{{ URL::asset('images/profil2.jpg') }}" alt="" class="bd-placeholder-img rounded-circle" width="150" height="150" role="img">
            <h2>Alejandra Hidalgo Zavala</h2>
            <p>Diputada de Champotón</p>
            <p>
              <a class="btn btn-secondary" href="https://www.facebook.com/AlejandraHidalgoZavala" target="_blank"><i class='bx bxl-facebook'></i></a>
              <a class="btn btn-secondary" href="https://www.instagram.com/alejandrahidalgozavala/" target="_blank"><i class='bx bxl-instagram'></i></a>
              <a class="btn btn-secondary" href="https://www.youtube.com/channel/UCn8UL6SjT77jkrlnARBusjw" target="_blank"><i class='bx bxl-youtube'></i></a>
            </p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img src="{{ URL::asset('images/anibal.jpg') }}" alt="" class="bd-placeholder-img rounded-circle" width="150" height="150" role="img">
            <h2>Aníbal Ostoa Ortega</h2>
            <p>Secretario General de Gobierno de Campeche</p>
            <p>
              <a class="btn btn-secondary" href="https://www.facebook.com/aostoaortega" target="_blank"><i class='bx bxl-facebook'></i></a>
              <a class="btn btn-secondary" href="https://www.instagram.com/anibal_ostoa/" target="_blank"><i class='bx bxl-instagram'></i></a>
            </p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
        <!-- START THE FEATURETTES -->
        <hr class="featurette-divider">
        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">“DELITOS CONTRA LA VIDA Y LA INTEGRIDAD CORPORAL”<span class="text-muted"> del Código Penal del Estado de Campeche </span></h2>
            <p class="lead">En México, la violencia obstétrica se ha posicionado a través de los años, como una de las principales
                formas de violencia contra la mujer, datos revelados en 2016, por la Encuesta Nacional sobre la
                Dinámica de las Relaciones en los Hogares (ENDIREH-2016), llevada a cabo por el Instituto Nacional
                de Estadística y Geografía, permitió visibilizar de forma contundente la multiplicidad de casos en que
                una mujer es víctima de violencia obstétrica.</p>
              <p class="lead">Esta iniciativa fue propuesta por la Diputada Balbina Alejandra Hidalgo Zavala, integrante del Grupo Legislativo de
                  Morena sometiendo a consideración de esta Honorable Asamblea la presente Iniciativa con Proyecto de Decreto
                  que adiciona el Capítulo VIII denominado “VIOLENCIA OBSTÉTRICA”.</p>
          </div>
          <div class="col-md-5">
              <img src="{{URL::asset('images/diputada.png')}}" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500">
          </div>
        </div>
        <hr class="featurette-divider">
        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">"LA LEY DE DERECHOS DE NIÑAS, NIÑOS Y ADOLESCENTES" <span class="text-muted">del estado de Campeche.</span></h2>
            <p class="lead">En México, miles de niñas, niños y adolescentes se encuentran sometidos a múltiples formas contemporáneas de esclavitud, como lo es la explotación laboral infantil.
                La Encuesta Nacional de Trabajo Infantil (ENTI) del año 2019, formulada por el Instituto Nacional de Estadística y Geografía (INEGI), estimó que en la Republica Mexicana 3.3 millones de niñas,
                niños y adolescentes de 5 a 17 años realizan algún tipo de trabajo. </p>
              <p class="lead">Esta iniciativa fue propuesta por la  Diputada Balbina Alejandra Hidalgo Zavala, integrante del Grupo
                  Legislativo de Morena, sometiendo a consideración de esta Honorable Asamblea la presente Iniciativa con Proyecto de Decreto que reforma la fracción VI del artículo 46 de la
                  Ley de Derechos de Niñas, Niños y Adolescentes del Estado de Campeche.
              </p>
          </div>
          <div class="col-md-5 order-md-1">
              <img src="{{URL::asset('images/diputada.png')}}" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500">
          </div>
        </div>
        <hr class="featurette-divider">
        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading"> "LEY DE LA PROTECCION DE LOS ADULTOS MAYORES" <span class="text-muted">del estado de Campeche.</span></h2>
            <p class="lead">En el sector poblacional de los adultos mayores, en algunas ocasiones hay personas que no les gusta
                revelar sus años de vida, pues algunas de ellas no conciben el hecho de llegar a la etapa del
                envejecimiento, lo que se traduce en dependencia y el final de una etapa de libertades; sin embargo,
                esto es algo ineludible y algo contra lo que no se puede lidiar; y que finalmente es necesario enfrentar
                de la mejor manera.
                La discriminación es uno de los principales problemas que los adultos mayores enfrentan en el interior
                de nuestra sociedad, la cual tiene poco o nulo interés en integrarlos en actividades diarias, así como
                de tomarlos en cuenta en los ámbitos sociales y hasta familiares por el hecho de ser personas adultas.</p>
              <p class="lead">
                  Esta iniciativa fue propuesta por la  Diputada Balbina Alejandra Hidalgo Zavala, integrante del Grupo
                  Legislativo de Morena, sometiendo a consideración de esta Honorable Asamblea la presente  Iniciativa de
                  Decreto que Reforma los Incisos b y c; y Adiciona el Inciso d de la Fracción VII, todos del Artículo
                  5 de la Ley de Protección de los Adultos Mayores del Estado de Campeche.
              </p>
          </div>
          <div class="col-md-5">
              <img src="{{URL::asset('images/diputada.png')}}" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500">
          </div>
        </div>
        <hr class="featurette-divider">
        <!-- /END THE FEATURETTES -->
      </div><!-- /.container -->
      <!-- FOOTER -->
      <footer class="container">
        <h1 class="float-end"><a href="#"><i class='bx bx-up-arrow-alt'></i></a></h1>
      </footer>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
