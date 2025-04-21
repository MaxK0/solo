@extends('layout')

@section('content')
    <section class="login__section form__center">
        <div class="container">
            <form action="{{ route('login.store') }}" method="POST">
                <h1>Вход</h1>
                @csrf
                <div class="form__block">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="input">
                    @error('email')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form__block">
                    <label for="password">Пароль</label>
                    <input type="password" id="password" name="password" value="{{ old('password') }}" class="input">
                    @error('password')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <button class="btn-main" type="submit">Войти</button>
            </form>
        </div>
    </section>
@endsection
