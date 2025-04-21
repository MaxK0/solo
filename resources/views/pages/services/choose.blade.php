@extends('layout')

@section('content')
    <section class="choose__section form__center">
        <div class="container">
            <form action="{{ route('services.chose', $service->id) }}" method="POST">
                @csrf
                <div class="form__block">
                    <label for="price_id">Цена</label>
                    <select name="price_id" id="price_id" class="input">
                        @foreach($prices as $price)
                            <option
                                value="{{ $price['id'] }}"
                                {{ old('price_id') === $price['id'] ? 'selected' : '' }}>
                                {{ $price['category'] . ' - ' . $price['price'] . ' руб.' }}
                            </option>
                        @endforeach
                    </select>
                    @error('price_id')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form__block">
                    <label for="start">Время визита</label>
                    <input type="datetime-local" class="input" name="start" id="start" value="{{ old('start') }}">
                    @error('start')
                    <p class="error">{{ $message }}</p>
                    @enderror
                    @error('error')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <button class="btn-main" type="submit">Посмотреть сотрудников</button>

            </form>
        </div>
    </section>
@endsection
