<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ @asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ @asset('/fontawesome/css/all.min.css') }}">
    <link rel="icon" href="{{ @asset('/img/logo.svg') }}">
</head>
<body>
<div id="site">
    <header class="header">
        <div class="container header__container">
            <nav class="header__nav">
                <div class="header__title">
                    <a href="{{ route('home') }}" class="link-nav">
                        <img src="{{ @asset('/img/logo.svg') }}" alt="SOLO">
                    </a>
                </div>
                <i id="header__menu" class="fa-solid fa-bars"></i>
                <ul class="header__ul">
                    <li><a href="{{ route('home')}}" class="link-nav">Главная</a></li>
                    <li><a href="{{ route('services')}}" class="link-nav">Услуги</a></li>
                    <li><a href="https://n1030883.yclients.com/company/955919/personal/menu?o=" target="_blank" class="link-nav">Записаться</a></li>
{{--                    @guest()--}}
{{--                        <li><a href="{{ route('login') }}" class="link-nav">Войти</a></li>--}}
{{--                        <li><a href="{{ route('register') }}" class="link-nav">Зарегистрироваться</a></li>--}}
{{--                    @endguest--}}

{{--                    @auth()--}}
{{--                        <li class="header-sm-screen"><a class="link-nav" href="{{ route('profile') }}">Профиль</a></li>--}}
{{--                        <li class="header-sm-screen"><a class="link-nav" href="{{ route('logout') }}">Выйти</a></li>--}}
{{--                    @endauth--}}

{{--                    @auth()--}}
{{--                        <li class="header__profile">--}}
{{--                            <div class="link-nav header__profile__name">--}}
{{--                                <i class="fa-solid fa-chevron-down"></i>--}}
{{--                                <i class="fa-solid fa-chevron-up"></i>--}}
{{--                                <p>{{ auth()->user()->short_name }}</p>--}}
{{--                            </div>--}}
{{--                            <ul class="header__profile__menu">--}}
{{--                                <li><a class="link-nav" href="{{ route('profile') }}">Профиль</a></li>--}}
{{--                                <li><a class="link-nav" href="{{ route('logout') }}">Выйти</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                    @endauth--}}
                </ul>
            </nav>
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container footer__container">
            <div class="footer__blocks">
                <div class="footer__info">
                    <div class="footer__info__block">
                        <i class="fa-solid fa-house"></i>
                        <p>Бульвар Ибрагимова, 32</p>
                    </div>
                    <div class="footer__info__block">
                        <i class="fa-solid fa-clock"></i>
                        <p>10.00 - 22.00 ч.</p>
                    </div>
                    <div class="footer__info__block">
                        <i class="fa-solid fa-phone"></i>
                        <a href="tel:+79872425251" class="link-nav">+7 (987) 242 52-51</a>
                    </div>
                </div>
                <div class="footer__social">
                    <a href="https://vk.com/solonailufa" class="link-nav">
                        <i class="fa-brands fa-vk"></i>
                    </a>
                    <a href="https://www.instagram.com/solo.nail.ufa/" class="link-nav">
                        <i class="fa-brands fa-instagram">
{{--                            <span class="inst-banned">*</span>--}}
                        </i>
                    </a>
                    <a href="https://n1030883.yclients.com/company/955919/personal/menu?o=" target="_blank" class="link-nav order">Записаться</a>
                </div>
            </div>
            <p class="footer__copyright">© SOLO Nail Studio</p>
        </div>
    </footer>
</div>
<div id="back-to-top" class="back-to-top">
    <i class="fa-solid fa-arrow-up"></i>
</div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const profileName = document.querySelector('.header__profile__name');
        const profileMenu = document.querySelector('.header__profile__menu');


        if (profileName) {
            const chevronUp = profileName.querySelector('.fa-chevron-up');
            const chevronDown = profileName.querySelector('.fa-chevron-down');

            profileName.addEventListener('click', function() {
                if (profileMenu.classList.contains('active')) {
                    profileMenu.classList.remove('active');
                    chevronUp.style.display = 'none';
                    chevronDown.style.display = 'inline';
                } else {
                    profileMenu.classList.add('active');
                    chevronUp.style.display = 'inline';
                    chevronDown.style.display = 'none';
                }
            });

            document.addEventListener('click', function (event) {
                if (!profileName.contains(event.target) && !profileName.contains(event.target)) {
                    if (profileMenu.classList.contains('active')) {
                        chevronUp.style.display = 'none';
                        chevronDown.style.display = 'inline';
                    }
                    profileMenu.classList.remove('active');
                }
            });
        }

        const menuButton = document.getElementById('header__menu');
        const headerUl = document.querySelector('.header__ul');

        menuButton.addEventListener('click', function () {
            headerUl.classList.toggle('active');
        });

        document.addEventListener('click', function (event) {
            if (!headerUl.contains(event.target) && !menuButton.contains(event.target)) {
                headerUl.classList.remove('active');
            }
        });

        const backToTopButton = document.getElementById('back-to-top');

        window.addEventListener('scroll', function() {
            if (window.scrollY > window.innerHeight) { // 100vh
                backToTopButton.classList.add('show');
            } else {
                backToTopButton.classList.remove('show');
            }
        });

        backToTopButton.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
</script>
</html>
