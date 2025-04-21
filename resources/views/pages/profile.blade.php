@extends('layout')

@section('content')
    <section class="profile">
        <div class="container">
            <h2>Ваши заявки</h2>

            <div class="profile__filter">
                <form method="GET" action="{{ route('profile') }}">
                    <select name="status" class="btn-main" onchange="this.form.submit()">
                        <option value="">Все статусы</option>
                        @foreach($statuses as $status)
                            <option value="{{ $status }}" {{ $selectedStatus == $status ? 'selected' : '' }}>
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>

            @if(count($orders))
                <div class="orders">
                    @foreach($orders as $order)
                        <table class="table show__table">
                            <tbody class="tbody tbody__show">
                            <tr>
                                <th>Услуга</th>
                                <td>{{ $order->service?->title }}</td>
                            </tr>
                            @if(empty($selectedStatus))
                            <tr>
                                <th>Статус</th>
                                <td>{{ $order->status }}</td>
                            </tr>
                            @endif
                            <tr>
                                <th>Сотрудник</th>
                                <td>{{ $order->employee?->name }}</td>
                            </tr>
                            <tr>
                                <th>Начало</th>
                                <td>{{ $order->start }}</td>
                            </tr>
                            <tr>
                                <th>Конец</th>
                                <td>{{ $order->end }}</td>
                            </tr>
                            <tr>
                                <th>Цена</th>
                                <td>{{ $order->price->price }}</td>
                            </tr>
                            </tbody>
                        </table>
                    @endforeach
                </div>
            @else
                <p>У вас нет заявок c этим статусом</p>
            @endif
        </div>
    </section>
@endsection
