@extends('layouts.base')

@section('page.title', 'Вибір профілю')

@section('content')
    
<section class="select-page select-page__container page">

    <div class="section__header-text">
        <h2>Оберіть тип профілю</h2>
        <p class="section__header-subtitle">Ласкаво просимо в наш віртуальний світ, де можливості не мають меж, а співпраця – легка та захоплива</p>
    </div>

    <div class="select-page__blocks">
        <a href="{{ route('register.user') }}" class="select-page__block">

            <div class="select-page__icon">
                <svg>
                    <use xlink:href="{{ asset('img/icons/icons.svg#IconUser') }}"></use>
                </svg>
            </div>

            <h4 class="select-page__block-title">Фізична особа</h4>
            <p class="select-page__block-subtitle">Тип профілю</p>
            <p class="select-page__block-description">Профіль для фізичних осіб: зручне керування вантажами та орендою транспорту, що забезпечує максимальну ефективність</p>

        </a>

        <a href="{{ route('register.company') }}" class="select-page__block">

            <div class="select-page__icon">
                <svg>
                    <use xlink:href="{{ asset('img/icons/icons.svg#IconCompany') }}"></use>
                </svg>
            </div>

            <h4 class="select-page__block-title">Підприємство</h4>
            <p class="select-page__block-subtitle">Тип профілю</p>
            <p class="select-page__block-description">Профіль для підприємств: ефективне керування вантажами та орендою транспорту, що дозволяє оптимізувати всі операції</p>

        </a>
    </div>


</section>

@endsection