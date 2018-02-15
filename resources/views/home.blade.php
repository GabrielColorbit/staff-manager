@extends('layouts.app')

@section('content')
<el-container>
    <el-aside width="200px">
        <el-menu>
            <el-menu-item index="1">
                <router-link to="/employees">Cadastro de Empregados</router-link>
            </el-menu-item>
        </el-menu>
    </el-aside>
    <el-main>
        <router-view></router-view>
    </el-main>
</el-container>
@endsection

@section('script')
    <script src="{{ mix('js/home.js') }}"></script>
@endsection

@section('style')
    <link href="{{ mix('css/home.css') }}" rel="stylesheet">
@endsection
