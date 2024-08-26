@extends('layouts.base')

@section('page.title', 'Вибір профілю')

@section('content')
    
<section class="select-page select-page__container page">

    <div class="cargo__header">
        <div class="cargo__header-inner">
            <h2 class="cargo__title">{{ $cargo->name }}</h2>
            <p class="cargo__status">{{ __('Преміум вантаж')}}</p>
        </div>

        <div class="price">
            <p class="price__title">
                <svg>
                    <use xlink:href="{{ asset('img/icons/icons.svg#IconPrice') }}"></use>
                </svg>
                {{ $cargo->price }} ₴
            </p>
            <p class="price__subtitle">{{ number_format($cargo->price / $cargo->distance, 1, ',', '') }} ₴ / {{ __('км.') }}</p>
        </div>

        <div class="cargo__info">
            <div class="cargo__info-block">
                <div class="cargo__info-icon">
                    <svg>
                        <use xlink:href="{{ asset('img/icons/icons.svg#IconPayMethod') }}"></use>
                    </svg>
                </div>
                <ul class="cargo__info-list">
                    <li class="cargo__info-title">{{ $cargo->pay_method }}</li>
                    <li class="cargo__info-subtitle">{{ __('Тип оплати')}}</li>
                </ul>
            </div>

            <div class="cargo__info-block">
                <div class="cargo__info-icon">
                    <svg>
                        <use xlink:href="{{ asset('img/icons/icons.svg#IconBodyType') }}"></use>
                    </svg>
                </div>
                <ul class="cargo__info-list">
                    <li class="cargo__info-title">{{ $cargo->body }}</li>
                    <li class="cargo__info-subtitle">{{ __('Тип кузову')}}</li>
                </ul>
            </div>

            <div class="cargo__info-block">
                <div class="cargo__info-icon">
                    <svg>
                        <use xlink:href="{{ asset('img/icons/icons.svg#IconDistance') }}"></use>
                    </svg>
                </div>
                <ul class="cargo__info-list">
                    <li class="cargo__info-title">≈{{ $cargo->distance }}</li>
                    <li class="cargo__info-subtitle">{{ __('Відстань , км')}}</li>
                </ul>
            </div>

            <div class="cargo__info-block">
                <div class="cargo__info-icon">
                    <svg>
                        <use xlink:href="{{ asset('img/icons/icons.svg#IconWeight') }}"></use>
                    </svg>
                </div>
                <ul class="cargo__info-list">
                    <li class="cargo__info-title">{{ $cargo->weight }}</li>
                    <li class="cargo__info-subtitle">{{ __('Вага товару, кг')}}</li>
                </ul>
            </div>

            @if ($cargo->urgent)
            <div class="cargo__info-block">
                <div class="cargo__info-icon">
                    <svg>
                        <use xlink:href="{{ asset('img/icons/icons.svg#IconUrgent') }}"></use>
                    </svg>
                </div>
                <ul class="cargo__info-list">
                    <li class="cargo__info-title">{{ __('Терміновий')}} </li>
                    <li class="cargo__info-subtitle"> {{ __('Статус')}}</li>
                </ul>
            </div>
            @endif

        </div>
    </div>

    <div class="cargo__locations">

        <div class="cargo__locations-inner">

            <div class="cargo__locations-icon">
                <svg>
                    <use xlink:href="{{ asset('img/icons/icons.svg#IconMap') }}"></use>
                </svg>
            </div>

            <div class="cargo__locations-block">

                <ul class="cargo__locations-list">
                    <li class="cargo__locations-city">{{ $cargo->loadCity->name }}</li>
                    <li class="cargo__locations-region">{{ $cargo->loadRegion->name }}</li>
                </ul>

                <p class="cargo__locations-date">{{ $cargo->load_date->format('d.m.Y') }}</p>
            </div>
        </div>

        <ul class="cargo__decor">
            <li class="cargo__decor-circle"></li>
            <li class="cargo__decor-line"></li>
            <li class="cargo__decor-circle"></li>
            <li class="cargo__decor-line _muted"></li>
            <li class="cargo__decor-circle _muted"></li>
        </ul>

        <div class="cargo__locations-inner">

            <div class="cargo__locations-icon">
                <svg>
                    <use xlink:href="{{ asset('img/icons/icons.svg#IconMap') }}"></use>
                </svg>
            </div>

            <div class="cargo__locations-block">

                <ul class="cargo__locations-list">
                    <li class="cargo__locations-city">{{ $cargo->unloadCity->name }}</li>
                    <li class="cargo__locations-region">{{ $cargo->unloadRegion->name }}</li>
                </ul>

                <p class="cargo__locations-date">{{ $cargo->unload_date->format('d.m.Y') }}</p>
            </div>
        </div>

    </div>

    <h3 class="cargo__description-title">{{ __('Опис вантажу')}}</h3>
    <p class="cargo__description">{{ $cargo->description ?? __('Опис вантажу відсутній')}}</p>

    <div class="user-block">
        <a href="" class="user-block__user">
            @if ($cargo->user->avatar)
                <img src="{{ asset('storage/' . $cargo->user->avatar->path) }}" alt="Profile user image" class="user-block__avatar">  
            @else
                <img src="" alt="Default user image" class="user-block__avatar">
            @endif

            <ul class="user-block__user-list">
                @if ($cargo->user->type == 'user')
                    <li class="user-block__user-name">{{ $cargo->user->last_name }} {{ $cargo->user->name }} {{ $cargo->user->middle_name }}</li>
                    <li class="user-block__user-type">{{ __('Фізична особа')}}</li>
                @else
                    <li class="user-block__user-name">{{ $cargo->user->name }}</li>
                    <li class="user-block__user-type">{{ __('Підприємство')}}</li>
                @endif
            </ul>
        </a>

        <div class="user-block__contacts">
            <div class="user-block__contact-block">

                <div class="user-block__contact-icon">
                    <svg>
                        <use xlink:href="{{ asset('img/icons/icons.svg#IconPhone') }}"></use>
                    </svg>
                </div>

                <ul class="user-block__contact-list">
                    <li class="user-block__contact-title"><a href="tel:{{ $cargo->user->phone }}">{{ $cargo->user->phone }}</a></li>
                    <li class="user-block__contact-subtitle">{{ __('Контактний номер')}}</li>
                </ul>
            </div>

            <div class="user-block__contact-block">

                <div class="user-block__contact-icon">
                    <svg>
                        <use xlink:href="{{ asset('img/icons/icons.svg#IconStarLine') }}"></use>
                    </svg>
                </div>

                <ul class="user-block__contact-list">
                    <li class="user-block__contact-title">4,8</li>
                    <li class="user-block__contact-subtitle">{{ __('Рейтинг користувача')}}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section_offset qr__container">
    <div class="qr">
        <div class="qr__text">
            <h2 class="qr__title">{{ __('Діліться вантажем з легкістю та QR-магією')}}</h2>
            <p class="qr__subtitle">{{ __('Діліться вантажем з легкістю, створюючи QR-коди, які надають миттєвий доступ до необхідної інформації')}}</p>
        </div>

        <img src="{{ Storage::url($cargo->qrCode->path) }}" alt="QR Code for {{ $cargo->name }}" class="qr__image">
    </div>
</section>

@endsection