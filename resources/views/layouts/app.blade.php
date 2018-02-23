<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <!-- <link href="http://br836.teste.website/~color914/colorbit.com.br/staff-manager/public/css/app.css" rel="stylesheet"> -->
    @yield('style')
</head>
<body>
    <div id="app">
        <el-container>
            <el-header class="header" height="65px">
                <div class="brand">
                    <a href="{{ url('/home') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                @guest
                    <el-menu class="header-operations" mode="horizontal">
                        <el-menu-item index="1">
                            <a href="{{ route('login') }}">Login</a>
                        </el-menu-item>
                        <el-menu-item index="2" >
                            <a href="{{ route('register') }}">Registrar</a>
                        </el-menu-item>
                    </el-menu>
                @else
                    <el-menu class="header-operations" mode="horizontal">
                        <el-menu-item index="1">
                            <span class="name">{{ Auth::user()->name }}</span>
                        </el-menu-item>
                        <el-menu-item index="2">
                            <form class="actions" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <el-button type="primary" native-type="submit">Logoff</el-button>
                            </form>
                        </el-menu-item>
                    </el-menu>
                @endguest
            </el-header>
            @yield('content')
        </el-container>
    </div>

    <script src="https://www.gstatic.com/firebasejs/4.10.1/firebase.js"></script>
    <script>
    // Initialize Firebase
    var config = {
        apiKey: "AIzaSyCDGprftmL87bQP5w_7Gg68aRg8jwtXQdg",
        authDomain: "staff-manager-c66b0.firebaseapp.com",
        databaseURL: "https://staff-manager-c66b0.firebaseio.com",
        projectId: "staff-manager-c66b0",
        storageBucket: "",
        messagingSenderId: "900798625646"
    };
    firebase.initializeApp(config);
    </script>
    <!-- Scripts -->
    @if(config('app.env') == 'local')
        <script src="http://127.0.0.1:35729/livereload.js"></script>
    @endif
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    @yield('script')
    
</body>
</html>
