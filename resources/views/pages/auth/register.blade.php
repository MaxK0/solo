@extends('layout')

@section('content')
    <section class="register__section form__center">
        <div class="container">
            <form action="{{ route('register.store') }}" method="POST">
                <h1>Регистрация</h1>
                @csrf
                <div class="form__block">
                    <label for="name">Имя</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="input">
                    @error('name')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form__block">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="input">
                    @error('email')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form__block">
                    <label for="email">Пароль</label>
                    <input type="password" id="password" name="password" value="{{ old('password') }}" class="input">
                    @error('password')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form__block">
                    <label for="password">Подтверждение пароля</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" class="input">
                    @error('password_confirmation')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <button class="btn-main" type="submit">Зарегистрироваться</button>
            </form>
        </div>
    </section>
@endsection
