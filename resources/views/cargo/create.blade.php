@extends('layouts.base')

@section('page.title', 'Новий вантаж')

@section('content')
    
@if (session('success'))
@php
$success = session('success');
@endphp

    <x-alert-success
        :title="__('Вантаж додано')"
        :description="__('Вантаж додано - ви на крок ближче до нових можливостей')">
    </x-alert-success>

@endif

@php
    $regionOptions = [];

    foreach($regions as $region) {
        $regionOptions[$region->id] = $region->name;
    }

@endphp

<section class="create-cargo-page create-cargo__container page">

    <div class="section__header-text">
        <h2>{{ __('Новий вантаж') }}</h2>
        <p class="section__header-subtitle">{{ __('Вкажіть необхідні дані, визначте умови перевезення та отримайте доступ до широкого спектру транспортних рішень') }}</p>
    </div>

    <x-form.form action="{{ route('cargo.store') }}" method="post">
        <x-form.block 
        :title="__('Основні дані')">

            <x-form.input-wrapper 
            icon="{{ asset('img/icons/icons.svg#IconCargoAddInput') }}" 
            :label="__('Введіть назву товару')" 
            name="name" 
            for="name"/>

            <x-form.input-wrapper 
            icon="{{ asset('img/icons/icons.svg#IconWeight') }}" 
            :label="__('Введіть вагу товару')" 
            name="weight" 
            for="weight" 
            type="number" />
           
           <x-form.select 
           :label="__('Оберіть тип кузова')" 
           icon="{{ asset('img/icons/icons.svg#IconBodyType')}}" 
           name="body" 
           :options="[
                1 => 'Тентований',
                2 => 'Фургон'
            ]" />
            
            <x-form.input-wrapper 
            icon="{{ asset('img/icons/icons.svg#IconDistance') }}" 
            :label="__('Відстань перевезення, км')" 
            name="distance" 
            for="distance" 
            type="number"/>
           
            <x-form.input-wrapper 
            icon="{{ asset('img/icons/icons.svg#IconPrice') }}" 
            :label="__('Ціна перевезення, грн')" 
            name="price" 
            for="price" 
            type="number"/>
           
           <x-form.select 
           :label="__('Оберіть тип оплати')"
           name="pay_method" 
           icon="{{ asset('img/icons/icons.svg#IconPayMethod')}}" 
           :options="[
                'Готівка' => 'Готівка',
            ]" />

        </x-form.block>

        <x-form.block :title="__('Дані про завантаження')">

            <x-form.select 
            :label="__('Область завантаження')" 
            id="region-load-select" 
            icon="{{ asset('img/icons/icons.svg#IconMap')}}" 
            name="load_region_id" 
            :options="$regionOptions" />
            
            <x-form.select 
            :label="__('Місто завантаження')" 
            id="city-load-select" 
            icon="{{ asset('img/icons/icons.svg#IconMap')}}" 
            name="load_city_id" 
            data_old_city="{{old('load_city_id')}}" />
           
           <x-form.input-wrapper 
           icon="{{ asset('img/icons/icons.svg#IconDate') }}" 
           :label="__('Дата завантаження')" 
           name="load_date" 
           for="load_date" 
           type="date" />

        </x-form.block>

        <x-form.block :title="__('Дані про розвантаження')">
            
            <x-form.select 
            :label="__('Область розвантаження')" 
            id="region-unload-select" 
            icon="{{ asset('img/icons/icons.svg#IconMap')}}" 
            name="unload_region_id" 
            :options="$regionOptions" />

            <x-form.select 
            :label="__('Місто розвантаження')" 
            id="city-unload-select" 
            icon="{{ asset('img/icons/icons.svg#IconMap')}}" 
            name="unload_city_id" 
            data_old_city="{{old('unload_city_id')}}"
            />

            <x-form.input-wrapper 
            icon="{{ asset('img/icons/icons.svg#IconDate') }}" 
            :label="__('Дата розвантаження')" 
            name="unload_date" 
            for="unload_date" 
            type="date" />

        </x-form.block>

        <x-form.block :title="__('Опис вантажу')">

            <x-form.input-wrapper 
            icon="{{ asset('img/icons/icons.svg#IconDescription') }}" 
            :label="__('Опис вантажу')" 
            name="description" 
            for="description" 
            type="textarea">
            </x-form.input-wrapper>

        </x-form.block>

        <x-form.checkbox name="urgent">
            {{ __('Терміновий вантаж') }}
        </x-form.checkbox>
        
        <x-form.footer
        :button-text="__('Додати вантаж')"
        :description="__('Додаючи вантаж, ви погоджуєтесь з правилами нашої платформи. Ми цінуємо вашу співпрацю у дотриманні стандартів якості нашої спільноти')"/>
   
    </x-form.form>

</section>

@endsection