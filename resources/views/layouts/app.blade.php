<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>uangku</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Uangku
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                  @if (Auth::user())
                  <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}"><small><i class="fa fa-home"></i></small> Home</a></li>
                    <li><a href="{{ route('data.create') }}"><small><i class="fa fa-plus"></i></small> Tambah</a></li>
                    <li><a href="{{ url('/data') }}"><small><i class="fa fa-table"></i></small> Data</a></li>
                  </ul>
                  @endif

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Masuk</a></li>
                        <li><a href="{{ url('/register') }}">Daftar</a></li>
                    @else
                        <li><a href="#" id="saldo"></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/user') }}"><i class="fa fa-btn fa-gears"></i>Pengaturan</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Keluar</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script>
    $.get( "{{url('/g?op=getsaldo')}}", function( data ) {
      var saldo = data.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
      $( "#saldo" ).html( "Rp. "+ saldo );
      // $( "#saldoData" ).html( "Rp. "+ saldo );
    });
    $('.rp').each(function(){
        text = $(this).text().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
        $(this).html(text);
    });

    </script>
    @if (Request::route()->getName() == 'data.index')
      @if (Request::has('dari') and Request::has('ke'))
        <script>
            console.log("search dari ke");
            $.get( "{{url('/g?op=getsaldodarike')}}&dari={{Request::get('dari')}}&ke={{Request::get('ke')}}", function( data ) {
              var saldo = data.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
              $( "#saldoData" ).html( "Rp. "+ saldo );
            });
        </script>
      @else
        <script>
        $.get( "{{url('/g?op=getsaldo')}}", function( data ) {
          var saldo = data.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
          $( "#saldoData" ).html( "Rp. "+ saldo );
        });
        </script>
      @endif


      <script>
      console.log("data");
      </script>
    @endif

</body>
</html>
