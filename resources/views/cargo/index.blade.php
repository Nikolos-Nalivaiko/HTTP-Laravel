@extends('layouts.base')

@section('page.title', 'Біржа вантажів')

@section('content')

<section class="cargos cargos__container page">

    <h2>{{ __('Біржа вантажів') }}</h2>

    <x-filter.search action="{{ route('cargo.index') }}"></x-filter.search>

    <x-filter.form action="{{ route('cargo.index') }}" method="get">
        <x-filter.input-range title="Введіть вагу товару, кг" name_from="weight_from" name_to="weight_to" type="number" />
        <x-filter.input-range title="Відстань перевезення, км" name_from="distance_from" name_to="distance_to" type="number" />
        <x-filter.input-range title="Ціна перевезення, грн" name_from="price_from" name_to="price_to" type="number" />
        <x-filter.select title="Оберіть тип оплати" name="payment_type" :options="[
            1 => 'Тентований',
            2 => 'Фургон'
        ]" />
        <x-filter.select title="Оберіть тип кузова" name="body_type" :options="[
            1 => 'Тентований',
            2 => 'Фургон'
        ]" />
        <x-filter.select title="Область завантаження" name="load_region" :options="[
            1 => 'Тентований',
            2 => 'Фургон'
        ]" />
        <x-filter.select title="Місто завантаження" name="load_city" :options="[
            1 => 'Тентований',
            2 => 'Фургон'
        ]" />   
        <x-filter.input-range title="Дата завантаження" name_from="load_date_from" name_to="load_date_to" type="date" />    
        <x-filter.select title="Область розвантаження" name="unload_region" :options="[
            1 => 'Тентований',
            2 => 'Фургон'
        ]" />
        <x-filter.select title="Місто розвантаження" name="unload_city" :options="[
            1 => 'Тентований',
            2 => 'Фургон'
        ]" />                                    
        <x-filter.input-range title="Дата розвантаження" name_from="unload_date_from" name_to="unload_date_to" type="date" />   
    </x-filter.form>

    <h4 class="cargos__title"> {{ __('Знайдені вантажі') }}
        @if ($cargosCount) 
            <span>{{ $cargosCount }} {{ __('вантажа') }}</span> 
        @endif
    </h4>

    <div class="cargos__list">

        @if ($cargos->isEmpty())
            <p>
                {{ __('Немає вантажів для відображення') }}
            </p>
        @else

            @foreach ($cargos as $cargo)

            <div class="cargo-block">
                <div class="cargo-block__header">
    
                    <div class="cargo-block__header-inner">
                        <p class="cargo-block__title">{{ $cargo->name }}</p>
    
                        <div class="cargo-block__icons">
                            <div class="cargo-block__icon">
                                <svg>
                                    <use xlink:href="{{ asset('img/icons/icons.svg#IconPremiumCargo') }}"></use>
                                </svg>
                            </div>
    
                            @if ($cargo->urgent)
                                <div class="cargo-block__icon">
                                    <svg>
                                        <use xlink:href="{{ asset('img/icons/icons.svg#IconUrgent') }}"></use>
                                    </svg>
                                </div>
                            @endif
                        </div>
                    </div>
    
                    <ul class="cargo-block__info-list">
                        <li class="cargo-block__info-item">{{ $cargo->body }}</li>
                        <li class="cargo-block__info-item">{{ $cargo->weight }} т.</li>
                        <li class="cargo-block__info-item">≈{{ $cargo->distance }} км.</li>
                        <li class="cargo-block__info-item">{{ $cargo->pay_method }}</li>
                    </ul>
    
                </div>
    
                <div class="cargo-block__middle">
    
                    <div class="cargo-block__location-block">
                        <ul class="cargo-block__location-list">
                            <li class="cargo-block__location-city">{{ $cargo->loadCity->name }}</li>
                            <li class="cargo-block__location-region">{{ $cargo->loadRegion->name }}</li>
                        </ul>
                        <p class="cargo-block__location-date">
                            <svg>
                                <use xlink:href="{{ asset('img/icons/icons.svg#IconCargoBlockDate') }}"></use>
                            </svg>
                            {{ $cargo->load_date->format('d.m.Y') }}
                        </p>
                    </div>
    
                    <ul class="cargos__decor">
                        <li class="cargos__decor-circle"></li>
                        <li class="cargos__decor-line"></li>
                        <li class="cargos__decor-circle"></li>
                    </ul>
    
                    <div class="cargo-block__location-block">
                        <ul class="cargo-block__location-list">
                            <li class="cargo-block__location-city">{{ $cargo->unloadCity->name }}</li>
                            <li class="cargo-block__location-region">{{ $cargo->unloadregion->name }}</li>
                        </ul>
                        <p class="cargo-block__location-date">
                            <svg>
                                <use xlink:href="{{ asset('img/icons/icons.svg#IconCargoBlockDate') }}"></use>
                            </svg>
                            {{ $cargo->unload_date->format('d.m.Y') }}
                        </p>
                    </div>
                </div>

                <div class="cargo-block__footer">
                    <a href="{{ route('cargo.show', ['id' => $cargo->id]) }}" class="cargo-block__btn">{{ __('Детальніше') }}</a>
    
                    <div class="price">
                        <p class="price__title">
                            <svg>
                                <use xlink:href="{{ asset('img/icons/icons.svg#IconPrice') }}"></use>
                            </svg>
                            {{ $cargo->price }} ₴
                        </p>
                        <p class="price__subtitle">{{ number_format($cargo->price / $cargo->distance, 1, ',', '') }} {{ __('₴ / км.') }}</p>
                    </div>
                </div>
    
            </div>

            @endforeach

            {{ $cargos->links('components.pagination') }}

        @endif

    </div>
</section>

@endsection