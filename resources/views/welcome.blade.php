@extends('layout')

@section('content')
    <section class="title__section">
        <div class="container title__container">
            <div class="title__info">
                <h1>Студия ногтевого сервиса SOLO<br>
                    Студия в стиле DIOR</h1>
                <p>Мы создали пространство, где вы отдохнете, насладитесь атмосферой и почувствуете высокий профессионализм наших мастеров.</p>
            </div>
            <div class="title__slider">
                <img class="title__img active" src="{{ asset('/img/title/solo1.jpg') }}" alt="">
                <img class="title__img" src="{{ asset('/img/title/solo2.jpg') }}" alt="">
                <img class="title__img" src="{{ asset('/img/title/solo3.jpg') }}" alt="">
                <img class="title__img" src="{{ asset('/img/title/solo4.jpg') }}" alt="">
            </div>
        </div>
    </section>
    <section class="nails__section">
        <div class="container nails__container">
            <div class="nails__slider">
                <img src="{{ asset('/img/nails/img1.jpg') }}" alt="" class="nails__img active">
                <img src="{{ asset('/img/nails/img2.jpg') }}" alt="" class="nails__img active">
                <img src="{{ asset('/img/nails/img3.jpg') }}" alt="" class="nails__img active">
                <img src="{{ asset('/img/nails/img4.jpg') }}" alt="" class="nails__img">
                <img src="{{ asset('/img/nails/img5.jpg') }}" alt="" class="nails__img">
                <img src="{{ asset('/img/nails/img6.jpg') }}" alt="" class="nails__img">
                <img src="{{ asset('/img/nails/img8.jpg') }}" alt="" class="nails__img">
                <img src="{{ asset('/img/nails/img9.jpg') }}" alt="" class="nails__img">
                <img src="{{ asset('/img/nails/img10.jpg') }}" alt="" class="nails__img">
                <img src="{{ asset('/img/nails/img11.jpg') }}" alt="" class="nails__img">
                <img src="{{ asset('/img/nails/img12.jpg') }}" alt="" class="nails__img">
                <img src="{{ asset('/img/nails/img13.jpg') }}" alt="" class="nails__img">
                <img src="{{ asset('/img/nails/img14.jpg') }}" alt="" class="nails__img">
                <img src="{{ asset('/img/nails/img15.jpg') }}" alt="" class="nails__img">
                <img src="{{ asset('/img/nails/img16.jpg') }}" alt="" class="nails__img">
                <img src="{{ asset('/img/nails/img17.jpg') }}" alt="" class="nails__img">
                <img src="{{ asset('/img/nails/img18.jpg') }}" alt="" class="nails__img">
                <img src="{{ asset('/img/nails/img19.jpg') }}" alt="" class="nails__img">
                <img src="{{ asset('/img/nails/img20.jpg') }}" alt="" class="nails__img">
                <img src="{{ asset('/img/nails/img21.jpg') }}" alt="" class="nails__img">
                <img src="{{ asset('/img/nails/img22.jpg') }}" alt="" class="nails__img">
                <img src="{{ asset('/img/nails/img23.jpg') }}" alt="" class="nails__img">
                <img src="{{ asset('/img/nails/img24.jpg') }}" alt="" class="nails__img">
                <img src="{{ asset('/img/nails/img25.jpg') }}" alt="" class="nails__img">
                <img src="{{ asset('/img/nails/img26.jpg') }}" alt="" class="nails__img">
                <img src="{{ asset('/img/nails/img27.jpg') }}" alt="" class="nails__img">
            </div>
            <div class="nails__info">
                <p>В студии SOLO работают высококвалифицированные специалисты - мастера с большим опытом, вы можете сделать комплекс: снятие, маникюр и покрытие за 1 час 30 минут.</p>
                <a href="https://n1030883.yclients.com/company/955919/personal/menu?o=" target="_blank" class="btn-main white-bg">Записаться</a>
            </div>
        </div>
    </section>

    <section class="about__section">
        <div class="container about__container">
{{--            <img src="{{ asset('/img/tigr.png') }}" class="keys__tigr">--}}

            <h2>SOLO - высокий уровень сервиса, качество и душа</h2>
            <div class="about__text">
                <p>Мы заботимся о наших клиентах и за выбор нашей студии SOLO хотим вас отблагодарить.</p>
                <p>У нас есть <strong>ГАРАНТИЯ НА ПОКРЫТИЕ 7 ДНЕЙ</strong>.</p>
                <p>После педикюра мы подарим <strong>носочки</strong>.</p>
            </div>
{{--            <div class="about__details__blocks">--}}
{{--                <details class="about__details">--}}
{{--                    <summary class="about__details__summary">Гарантия</summary>--}}
{{--                    <div class="about__details__text">--}}
{{--                        Мы уверены в качестве своей работы: высококвалифицированные мастера и качественные материалы.<br><br>--}}
{{--                        Но если что то произошло с покрытием, у нас есть <strong>ГАРАНТИЯ НА ПОКРЫТИЕ 7 ДНЕЙ</strong> (мы бесплатно переделаем).--}}
{{--                    </div>--}}
{{--                </details>--}}
{{--                <details class="about__details">--}}
{{--                    <summary class="about__details__summary">Подарки</summary>--}}
{{--                    <div class="about__details__text">--}}
{{--                        Мы хотим сделать ваше посещение особенным и в качестве знака нашей благодарности мы подготовили для вас подарок - <strong>крем-маску для увлажнения рук</strong>.<br><br>--}}
{{--                        После педикюра мы подарим <strong>носочки</strong>.--}}
{{--                    </div>--}}
{{--                </details>--}}
{{--            </div>--}}
        </div>
    </section>

    <section class="gift__section">
        <div class="container">
            <h2>Крем-маска для рук</h2>
            <p class="gift__gift">В подарок!</p>
            <a href="https://n1030883.yclients.com/company/955919/personal/menu?o=" target="_blank" class="btn-main white-bg">Записаться</a>
            <div class="gift__imgs">
                <img class="gift__img" src="{{ asset('/img/gift.jpg') }}">
                <img src="{{ asset('/img/hands.png') }}" class="gift__hands">
            </div>
        </div>
    </section>

    <section class="keys__section">
        <div class="container">
            <h2>Наши ценности</h2>
            <div class="keys__blocks">
                <div class="keys__block">
                    <div class="keys__title">
                        <i class="fa-solid fa-briefcase"></i>
                        <h4>Большой опыт</h4>
                    </div>
                    <p>Наши мастера обладают стажем болле 3 лет.</p>
                </div>
                <div class="keys__block">
                    <div class="keys__title">
                        <i class="fa-solid fa-clock"></i>
                        <h4>Скорость</h4>
                    </div>
                    <p>Снятие, маникюр и покрытие за 1час 30 мин, работы в 4 руки.</p>
                </div>
                <div class="keys__block">
                    <div class="keys__title">
                        <i class="fa-solid fa-money-bill"></i>
                        <h4>Приемлемые цены</h4>
                    </div>
                    <p>Маникюр и покрытие от 1200 ₽.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="employees__section">
        <div class="container">
            <h2>Наши сотрудники</h2>
            <div class="employees__imgs">
                <img src="{{ asset('/img/employees/employee1.jpg') }}" alt="Эллина">
                <img src="{{ asset('/img/employees/employee2.jpg') }}" alt="Юлия">
                <img src="{{ asset('/img/employees/employee3.jpg') }}" alt="Полина">
                <img src="{{ asset('/img/employees/employee4.jpg') }}" alt="Сирена">
                <img src="{{ asset('/img/employees/employee5.jpg') }}" alt="Далия">
            </div>
        </div>
    </section>

    <section class="reviews-container">
        <div class="container">
            <h2 class="section-title">Отзывы</h2>

            <div class="reviews-carousel">
                <button class="carousel-button prev" id="prevReview">❮</button>

                <div class="reviews-wrapper">
                    @foreach($reviews->chunk(3) as $chunk)
                        <div class="reviews-group">
                            @foreach($chunk as $review)
                                <div class="review-card">
                                    <div class="review-stars">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $review->stars)
                                                <span class="star filled">★</span>
                                            @else
                                                <span class="star">☆</span>
                                            @endif
                                        @endfor
                                    </div>
                                    <p class="review-text">"{{ $review->text }}"</p>
                                    <p class="review-author">{{ $review->name }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>

                <button class="carousel-button next" id="nextReview">❯</button>
            </div>

            <div class="carousel-dots">
                @for($i = 0; $i < ceil(count($reviews)/3); $i++)
                    <span class="dot {{ $i === 0 ? 'active' : '' }}" data-index="{{ $i }}"></span>
                @endfor
            </div>
        </div>
    </section>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const items = document.querySelectorAll('.title__img');
        let curInd = 0;

        function showItem(index) {
            items.forEach((item, i) => {
                item.classList.toggle('active', i === index);
            });
        }

        function nextItem() {
            curInd = (curInd + 1) % items.length;
            showItem(curInd);
        }

        showItem(curInd);

        setInterval(nextItem, 3000);


        const itemsNails = document.querySelectorAll('.nails__img');
        let currentIndexNails = 0;

        const reviewsWrapper = document.querySelector('.reviews-wrapper');
        const reviewGroups = document.querySelectorAll('.reviews-group');
        const prevBtn = document.getElementById('prevReview');
        const nextBtn = document.getElementById('nextReview');
        const dots = document.querySelectorAll('.dot');

        let currentIndex = 0;
        const totalGroups = reviewGroups.length;

        // Сначала скрываем все группы кроме первой
        reviewGroups.forEach((group, index) => {
            group.style.display = index === 0 ? 'flex' : 'none';
        });

        // Функция для обновления видимой группы
        function updateCarousel() {
            reviewGroups.forEach((group, index) => {
                group.style.display = index === currentIndex ? 'flex' : 'none';
            });

            // Обновляем активные точки
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentIndex);
            });
        }

        // Переход к предыдущей группе
        prevBtn.addEventListener('click', function() {
            currentIndex = (currentIndex > 0) ? currentIndex - 1 : totalGroups - 1;
            updateCarousel();
        });

        // Переход к следующей группе
        nextBtn.addEventListener('click', function() {
            currentIndex = (currentIndex < totalGroups - 1) ? currentIndex + 1 : 0;
            updateCarousel();
        });

        // Переход по клику на точки
        dots.forEach(dot => {
            dot.addEventListener('click', function() {
                currentIndex = parseInt(this.getAttribute('data-index'));
                updateCarousel();
            });
        });
    });
</script>
