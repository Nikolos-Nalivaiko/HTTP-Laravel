@extends('layouts.base')

@section('page.title', 'Реєстрація профілю')

@section('content')

@php
    $regionOptions = [];

    foreach($regions as $region) {
        $regionOptions[$region->id] = $region->name;
    }

@endphp
    
<section class="sign-up sign-up__container page">
    <div class="section__header-text">
        <h2>{{ __('Реєстрація профілю') }}</h2>
        <p class="section__header-subtitle">{{ __('Зареєструйтеся, щоб отримати доступ до безмежних можливостей у світі перевезень та оренди транспорту') }}</p>
    </div>

    <x-form.form action="{{ route('register.store.user') }}" method="post">
        <x-form.block :title="__('Основні дані')">

            <x-form.input-wrapper 
            icon="{{ asset('img/icons/icons.svg#IconPassword') }}" 
            :label="__('Ваш пароль')" 
            name="password" 
            for="password" 
            type="password" 
            :show-icon-eye="true"/>
           
            <x-form.input-wrapper 
            icon="{{ asset('img/icons/icons.svg#IconPassword') }}" 
            :label="__('Повторіть ваш пароль')" 
            name="password_confirmation" 
            for="password_confirmation" 
            type="password" 
            :show-icon-eye="true"/>
            
            <x-form.input-wrapper 
            icon="{{ asset('img/icons/icons.svg#IconLogin') }}" 
            :label="__('Ваш логін')" 
            name="login" 
            for="login"/>
            
            <x-form.input-wrapper 
            icon="{{ asset('img/icons/icons.svg#IconUserInput') }}" 
            :label="__('Введіть ваше ім’я')" 
            name="name" 
            for="name"/>
           
            <x-form.input-wrapper 
            icon="{{ asset('img/icons/icons.svg#IconUserInput') }}" 
            :label="__('По-батькові')" 
            name="middleName" 
            for="middleName"/>
           
            <x-form.input-wrapper 
            icon="{{ asset('img/icons/icons.svg#IconUserInput') }}" 
            :label="__('Введіть ваше прізвище')" 
            name="lastName" 
            for="lastName"/>
        
        </x-form.block>

        <x-form.block :title="__('Контактні дані')">

            <x-form.select 
            :label="__('Оберіть вашу область')" 
            icon="{{ asset('img/icons/icons.svg#IconMap')}}" 
            name="region_id" 
            :options="$regionOptions"
            />

            <x-form.select 
            :label="__('Оберіть ваше місто')" 
            icon="{{ asset('img/icons/icons.svg#IconMap')}}" 
            name="city_id"
            data_old_city="{{old('city_id')}}" 
            />

            <x-form.input-wrapper 
            icon="{{ asset('img/icons/icons.svg#IconPhone') }}" 
            :label="__('Введіть ваш номер телефону')" 
            name="phone" 
            for="phone"/>
            
            <x-form.input-wrapper 
            icon="{{ asset('img/icons/icons.svg#IconMail') }}" 
            :label="__('Введіть ваш e-mail')" 
            for="email" 
            name="email" 
            type="email"/>
        
        </x-form.block>

        <x-form.block :title="__('Фото профілю')">

            <div class="file">
                <label for="fileInput">
                    <div class="file__icon">
                        <svg>
                            <use xlink:href="{{ asset('img/icons/icons.svg#IconUpload') }}"></use>
                        </svg>
                    </div>
                    <input type="file" id="fileInput" accept="image/*">
                    <span class="file__title">{{ __('Завантажте фото профілю') }}</span>
                    <span class="file__subtitle">{{ __('JPG, PNG, WEBP') }}</span>
                </label>
            </div>

            <div class="form-image form-image_single">
            </div>

        </x-form.block>
        
        <x-form.footer 
        :button-text="__('Зареєструватись')" 
        :description="__('Реєструючи профіль, ви погоджуєтесь з правилами нашої платформи. Ми цінуємо вашу співпрацю у дотриманні стандартів якості нашої спільноти')"
        />
    </x-form.form>

</section>

@endsection