@extends('layout')

@section('content')
    <section class="book__section form__center">
        <div class="container">
            <form action="{{ route('services.book', $service->id) }}" method="POST">
                @csrf
                <div class="form__block">
                    <label for="employee_id">Сотрудник</label>
                    <select name="employee_id" id="employee_id" class="input">
                        @foreach($employees as $employee)
                            <option
                                value="{{ $employee->id }}"
                                {{ old('employee_id') === $employee->id ? 'selected' : '' }}>
                                {{ $employee->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('employee_id')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <button class="btn-main" type="submit">Записаться</button>
            </form>
        </div>
    </section>
@endsection
