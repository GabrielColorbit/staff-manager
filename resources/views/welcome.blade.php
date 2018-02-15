@extends('layouts.app')

@section('content')
    <el-main>
        <h2>
            Olá, seja bem vindo ao sistema  {{ config('app.name', 'laravel')}}!
        </h2>
        <p>
            Sistema destinado a gerenciamento de funcionários, para utilizar basta registrar-se.
        </p>
    </el-main>
@endsection

@section('script')
    <script src="{{ mix('js/welcome.js') }}"></script>
    <!-- <script src="http://br836.teste.website/~color914/colorbit.com.br/staff-manager/public/js/welcome.js"></script> -->
@endsection

@section('style')
    <link href="{{ mix('css/welcome.css') }}" rel="stylesheet">
    <!-- <link href="http://br836.teste.website/~color914/colorbit.com.br/staff-manager/public/css/welcome.css" rel="stylesheet"> -->
@endsection
