@extends('layouts.base')

@section('page.title', 'Авторизація')

@section('content')

<section class="page sign-in">

    <div class="sign-in__container">
        <div class="sign-in__inner">
            <h2>{{ __('Ласкаво просимо') }}</h2>
            <p class="section__header-subtitle">{{ __('Ласкаво просимо в наш віртуальний світ, де можливості не мають меж, а співпраця – легка та захоплива') }}</p>
            
            <form action="{{ route('login.store') }}" method="post" class="sign-in__form">
                @csrf

                <x-form.input-wrapper icon="{{ asset('img/icons/icons.svg#IconLogin') }}" :label="__('Ваш логін')" name="login" for="login" type="text"/>
                <x-form.input-wrapper icon="{{ asset('img/icons/icons.svg#IconPassword') }}" :label="__('Ваш пароль')" name="password" for="password" type="password" :show-icon-eye="true"/>

                <x-form.checkbox name="remember">
                    {{ __('Запам’ятати мене') }}
                </x-form.checkbox>

                <button type="submit" class="btn btn_green sign-in__btn">{{ __('Авторизуватись') }}</button>
            </form>

            <a href="" class="btn btn_light sign-in__btn">{{ __('Відновити дані') }}</a>
            <p class="sign-in__goto">{{ __('Не маєте акаунту ?') }} <a href="{{ route('register.select') }}">{{ __('Створіть його') }}</a></p>

        </div>
    </div>

    <div class="sign-in__image">
        <img src="img/signInPage/signInBg.webp" alt="Image" width="680" height="584">
    </div>

</section>

@endsection
