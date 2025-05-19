@extends('layout')

@section('content')
    <section class="title__section">
        <div class="container title__container">
            <div class="title__info">
                <h1>SOLO nail studio</h1>
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
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const items = document.querySelectorAll('.title__img');
        let currentIndex = 0;

        function showItem(index) {
            items.forEach((item, i) => {
                item.classList.toggle('active', i === index);
            });
        }

        function nextItem() {
            currentIndex = (currentIndex + 1) % items.length;
            showItem(currentIndex);
        }

        showItem(currentIndex);

        setInterval(nextItem, 3000);


        const itemsNails = document.querySelectorAll('.nails__img');
        let currentIndexNails = 0;

        function showItems(startIndex) {
            itemsNails.forEach((item, index) => {
                if (index >= startIndex && index < startIndex + 3) {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });
        }

        function nextItems() {
            currentIndexNails = (currentIndexNails + 1) % (itemsNails.length - 2);
            showItems(currentIndexNails);
        }

        showItems(currentIndexNails);
        setInterval(nextItems, 3000);

    });

</script>
