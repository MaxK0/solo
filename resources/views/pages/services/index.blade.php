@extends('layout')

@section('content')
    <section class="services__index">
        <div class="container">
            <div class="category-filters">
                <button class="filter-btn active" data-category="all">Все категории</button>
                <button class="filter-btn" data-category="popular">Популярное</button>
                @foreach($categories as $category)
                    @if($category->services()->exists())
                        <button class="filter-btn" data-category="category-{{ $category->id }}">
                            {{ $category->title }}
                        </button>
                    @endif
                @endforeach
            </div>

            <div class="categories__blocks">
                @foreach($categories as $category)
                    @if($category->services()->exists())
                        <div class="category-section" data-category="category-{{ $category->id }}">
                            <table class="category__table">
                                <thead>
                                    <tr>
                                        <th>{{ $category->title }}</th>
                                        <th>Мастер</th>
                                        <th>Топ-мастер</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($category->services as $service)
                                    <tr data-is-popular="{{ $service->is_popular ? 'true' : 'false' }}">
                                        <td>{{ $service->title }}</td>
                                        @foreach($service->prices as $price)
                                            <td>{{ $price->price }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
{{--                            <h2>{{ $category->title }}</h2>--}}
{{--                            <div class="services__blocks">--}}
{{--                                @foreach($category->services as $service)--}}
{{--                                    <div class="services__block">--}}
{{--                                        <h4>{{ $service->title }}</h4>--}}
{{--                                        <div class="services__prices">--}}
{{--                                            <h5>Цены</h5>--}}
{{--                                            @foreach($service->prices as $price)--}}
{{--                                                <div class="services__price">--}}
{{--                                                    <h6>{{ $price->employeeCategory->title }}</h6>--}}
{{--                                                    <p>{{ $price->price }} руб.</p>--}}
{{--                                                </div>--}}
{{--                                            @endforeach--}}
{{--                                        </div>--}}
{{--                                        <div class="services__block__btn">--}}
{{--                                            <a href="{{ route('services.choose', $service->id) }}"--}}
{{--                                               class="btn-main">Записаться</a>--}}
{{--                                            <p>{{ $service->duration_time }} ч.</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                                @if($category->services->count() % 3 !== 0)--}}
{{--                                    <div class="services__block last"></div>--}}
{{--                                @endif--}}
{{--                            </div>--}}
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const categorySections = document.querySelectorAll('.category-section');

        filterButtons.forEach(button => {
            button.addEventListener('click', function () {
                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                const category = this.dataset.category;

                if (category === 'popular') {
                    categorySections.forEach(section => {
                        section.style.display = 'block';
                        const rows = section.querySelectorAll('tr[data-is-popular]');
                        let hasVisibleRows = false;
                        rows.forEach(row => {
                            if (row.dataset.isPopular === 'true') {
                                row.style.display = '';
                                hasVisibleRows = true;
                            } else {
                                row.style.display = 'none';
                            }
                        });
                        if (!hasVisibleRows) section.style.display = 'none';
                    });
                } else {
                    categorySections.forEach(section => {
                        const showSection = category === 'all' || section.dataset.category === category;
                        section.style.display = showSection ? 'block' : 'none';

                        if (showSection) {
                            const rows = section.querySelectorAll('tr[data-is-popular]');
                            rows.forEach(row => row.style.display = '');
                        }
                    });
                }
            });
        });
    });
</script>
