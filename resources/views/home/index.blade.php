@extends('layouts.base')

@section('page.title', 'Home page')

@section('content')

<section class="hero">
    <div class="hero__container">
        <div class="hero__inner">
            <h1 class="hero__title">Відправляйся в подорож з нами</h1>
            <p class="hero__subtitle">Інноваційний сервіс, який забезпечує ефективне та комфортне планування маршрутів, відкриваючи нові горизонти для ваших подорожей</p>
            <div class="hero__btns">
                <a href="" class="btn btn_green">Наші послуги</a>
                <a href="" class="btn btn_light">Про платформу</a>
            </div>
        </div>
    </div>

    <div class="hero__image">
    <img src="{{ asset('img/heroSection/hero.webp') }}" width="768" height="565" alt="Image">
    </div>
</section>

<section class="section_offset service service__container">
    <div class="section__header">
        <div class="section__header-text">
            <h2>Наші послуги</h2>
            <p class="section__header-subtitle">Ми пропонуємо вам не просто послуги, а найвищий ступінь задоволення ваших очікувань</p>
        </div>
        <div class="arrows-slider">
            <div class="arrow-slider swiper-button-prev">
                <svg>
                    <use xlink:href="{{ asset('img/icons/icons.svg#IconArrowLeft') }}"></use>
                </svg>
            </div>
            <div class="arrow-slider swiper-button-next">
                <svg>
                    <use xlink:href="{{ asset('img/icons/icons.svg#IconArrowRight') }}"></use>
                </svg>
            </div>
        </div>
    </div>

    <div class="service__slider swiper">
        <div class="service__wrapper swiper-wrapper">

            <div class="service__slide swiper-slide">
                <div class="service__block">
                    <div class="service__block-image">
                        <img src="{{ asset('img/serviceSection/serviceBg1.webp') }}" alt="Image">
                    </div>
                    <div class="service__block-inner">
                        <h4 class="service__block-title">Новий вантаж</h4>
                        <p class="service__block-subtitle">Тип послуги</p>
                        <p class="service__block-description">Маєте власний вантаж але не знаете як його перевезти? Просто додайте вантаж та очікуйте на відповід</p>
                        <a href="" class="btn btn_light service__block-btn">Додати вантаж</a>
                    </div>
                </div>
            </div>

            <div class="service__slide swiper-slide">
                <div class="service__block">
                    <div class="service__block-image">
                        <img src="{{ asset('img/serviceSection/serviceBg2.webp') }}" alt="Image">
                    </div>
                    <div class="service__block-inner">
                        <h4 class="service__block-title">Біржа вантажів</h4>
                        <p class="service__block-subtitle">Тип послуги</p>
                        <p class="service__block-description">Маєте власний транспорт але не знаете де знайти вантаж? Наша біржа допоможе вам з цим питанням</p>
                        <a href="" class="btn btn_light service__block-btn">Біржа вантажів</a>
                    </div>
                </div>
            </div>

            <div class="service__slide swiper-slide">
                <div class="service__block">
                    <div class="service__block-image">
                        <img src="{{ asset('img/serviceSection/serviceBg3.webp') }}" alt="Image">
                    </div>
                    <div class="service__block-inner">
                        <h4 class="service__block-title">Новий транспорт</h4>
                        <p class="service__block-subtitle">Тип послуги</p>
                        <p class="service__block-description">Хочете здавати транспорт в аренду? Просто додайте його на нашу платформу та очікуйте клієнтів</p>
                        <a href="" class="btn btn_light service__block-btn">Додати транспорт</a>
                    </div>
                </div>
            </div>

            <div class="service__slide swiper-slide">
                <div class="service__block">
                    <div class="service__block-image">
                        <img src="{{ asset('img/serviceSection/serviceBg4.webp') }}" alt="Image">
                    </div>
                    <div class="service__block-inner">
                        <h4 class="service__block-title">Біржа транспорту</h4>
                        <p class="service__block-subtitle">Тип послуги</p>
                        <p class="service__block-description">Хочете знайти транспорт в аренду? Наша транспортна біржа вам швидко та легко з цим питанням</p>
                        <a href="" class="btn btn_light service__block-btn">Біржа транспорту</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>

<section class="section_offset about about__container">
    <div class="about__image">
        <img src="{{ asset('img/aboutSection/about.webp') }}" alt="Image" width="595">

        <div class="about__icon">
            <span>
                <svg>
                    <use xlink:href="{{ asset('img/icons/icons.svg#IconCargos') }}"></use>
                </svg>
            </span>
        </div>

    </div>
    <div class="about__text">
        <h2 class="about__title">Логістична платформа для сучасного бізнесу</h2>
        <p class="about__subtitle">Наша платформа революціонізує логістику, швидко й зручно з'єднуючи вантажовідправників і перевізників, спрощуючи організацію перевезень</p>

        <div class="about__description">
            <div class="about__users">
                <img src="{{ asset('img/aboutSection/user1.webp') }}" alt="User image">
                <img src="{{ asset('img/aboutSection/user2.webp') }}" alt="User image">
                <img src="{{ asset('img/aboutSection/user3.webp') }}" alt="User image">
                <img src="{{ asset('img/aboutSection/user4.webp') }}" alt="User image">
            </div>

            <div class="about__rating">
                <div class="rating">
                    <svg>
                        <use xlink:href="{{ asset('') }}"></use>
                    </svg>
                    <span>4,0</span>
                </div>
                <p class="about__rating-title">Оцінка користувачів</p>
            </div>
        </div>

        <div class="about__btns">
            <a href="" class="btn btn_green">Наші послуги</a>
            <a href="" class="btn btn_light">Про платформу</a>
        </div>

    </div>
</section>


@endsection



