<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Calculadora_CIDR') }}</title>

    <!-- Styles 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link type="text/css" rel="stylesheet" href="style/css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="style/css/master.css"/>
    
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    
    <style> 
    
         #body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            background-color: #e0e0e0;
            font-size: 110%;
         }
        
         #main {
            flex: 1 0 auto;
         }
    
        #footer, #nav, .btn {
            background-color: #610B21;
        }
        
        #tamanoFooter { height: 50px; }
        
        .btn:hover {
            background-color: #840f2d; 
        }
        
        .dropdown-content li > a, .dropdown-content li > span {
            color: #840f2d;
        }
        
        [type="checkbox"]:checked + label:before {
            border-right: 2px solid #840f2d;
            border-bottom: 2px solid #840f2d;
        }
        
        input[type=text]:focus:not([readonly]) + label {
          color: #840f2d;
          font-size: 100%;
        }
        
        input[type=checkbox]:focus:not([readonly]) + label {
          color: #840f2d;
          font-size: 95%;
        }
        
        form label{font-size: 100%; color: #840f2d;}
        
        input[type=text]:focus:not([readonly]) {
          border-bottom: 1px solid #840f2d;
          box-shadow: 0 1px 0 0 #840f2d;
        }
        
    </style>
    
</head>

<body id="body">
        <header>
            <nav id="nav">
                <div class="nav-wrapper">
                    <div class="container center">
                        <font size=5><strong>Calculadora Subneteo</strong></font>
                    </div>
                </div>
            </nav>
        </header>
        
        <main id="main">
          <div class= "content">
            @yield('content')
          </div>
        </main>
        
        <footer id="footer" class="page-footer">
          <div id="tamanoFooter" class="footer-copyright">
            <div class="container center">
                <div class="col l6 s12">
                    <strong>Denisse González Salas</strong>
                    <br>
                    <strong>B33029</strong>
              </div>
            </div>
          </div>
        </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
    <script type="text/javascript" src="style/js/materialize.min.js"></script>

</html>
