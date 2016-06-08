<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>uangku</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/Font_lato.css')}}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
        .navbar-brand img{
          float:left;
          width:20px;
          margin-right:10px;
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
                    <img src="{{asset('uangku-logo.png')}}"> Uangku
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                  @if (Auth::user())
                  <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}"><small><i class="fa fa-home"></i></small> Home</a></li>
                    <li><a href="{{ route('data.create') }}"><small><i class="fa fa-plus"></i></small> Tambah</a></li>
                    <li><a href="{{ url('/data') }}"><small><i class="fa fa-table"></i></small> Data</a></li>
                    <li><a href="{{ url('/about') }}"><small><i class="fa fa-info"></i></small> Tentang</a></li>
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
    <script src="{{asset('js/Chart.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
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
        $.get( "{{url('/g?op=gettahundata')}}", function( data ) {
          var json = $.parseJSON(data);
          console.log(data);
          console.log("banyak tahun: "+json.length);
            for(var i = 0; i <json.length;i++){
                $('#tahun').append('<option value="'+json[i]+'">'+json[i]+'</option>');
            }
        });
        
    $('#tahun').change(function(){
      $('button#btntahun').click();
    });
    </script>
@yield('js')
</body>
</html>
