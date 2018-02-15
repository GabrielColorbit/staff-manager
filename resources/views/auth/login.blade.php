@extends('layouts.app')

@section('content')
<el-main>
    <el-row :gutter="20">
        <el-col :span="8" :offset="8">
            <el-card class="box-card">
                <div slot="header" class="clearfix">
                    <span>Login</span>
                </div>
                <el-form ref="form" :model="form" @submit="onSubmit" action="{{ route('login') }}" method="POST">
                    @csrf
                    <el-form-item label="Email" :error="$v.form.email.$error ? 'Email inválido' : '{{ $errors->first('email') }}'">
                        <el-input name="email" v-model="form.email" prefix-icon="el-icon-user" clearable @blur="$v.form.email.$touch"/>
                    </el-form-item>
                    <el-form-item label="Senha" :error="$v.form.password.$error ? 'Senha inválida' : '{{ $errors->first('password') }}'">
                        <el-input name="password" v-model="form.password" prefix-icon="el-icon-password" clearable type="password"  @blur="$v.form.password.$touch"/>
                    </el-form-item>
                    <el-form-item>
                        <el-checkbox name="remember" v-model="form.remember">Lembrar meus dados</el-checkbox>
                    </el-form-item>
                    <el-form-item>
                        <el-button type="primary" @click="onSubmit" native-type="submit" round>Login</el-button>
                    </el-form-item>
                </el-form>
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Esqueceu a senha?
                </a>
            </el-card>
        <el-col>
    </el-row>   
</el-main>
@endsection

@section('script')
    <script src="{{ mix('js/login.js') }}"></script>
@endsection

@section('style')
    <link href="{{ mix('css/login.css') }}" rel="stylesheet">
@endsection