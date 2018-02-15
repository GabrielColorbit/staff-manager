@extends('layouts.app')

@section('content')
<el-main>
    <el-row :gutter="20">
        <el-col :span="8" :offset="8">
            <el-card class="box-card">
                <div slot="header" class="clearfix">
                    <span>Login</span>
                </div>
                <el-form ref="form" :model="form" @submit="onSubmit" action="{{ route('register') }}" method="POST">
                    @csrf
                    <el-form-item label="Name" :error="$v.form.name.$error ? 'Name inválido' : '{{ $errors->first('name') }}'">
                        <el-input name="name" v-model="form.name" prefix-icon="el-icon-user" clearable @blur="$v.form.name.$touch"/>
                    </el-form-item>

                    <el-form-item label="Email" :error="$v.form.email.$error ? 'Email inválido' : '{{ $errors->first('email') }}'">
                        <el-input name="email" v-model="form.email" prefix-icon="el-icon-user" clearable @blur="$v.form.email.$touch"/>
                    </el-form-item>
                    <el-form-item label="Senha" :error="$v.form.password.$error ? 'Senha inválida' : '{{ $errors->first('password') }}'">
                        <el-input name="password" v-model="form.password" prefix-icon="el-icon-password" clearable type="password"  @blur="$v.form.password.$touch"/>
                    </el-form-item>
                    <el-form-item>
                        <el-button type="primary" @click="onSubmit" native-type="submit" round>Registrar</el-button>
                    </el-form-item>
                </el-form>
            </el-card>
        <el-col>
    </el-row>   
</el-main>

@endsection

@section('script')
    <script src="{{ mix('js/register.js') }}"></script>
@endsection

@section('style')
    <link href="{{ mix('css/register.css') }}" rel="stylesheet">
@endsection