<div class="alert">
    <div class="alert__content">
        <div class="alert__text">
            <div class="alert__icon-wrapper alert__icon-wrapper_success">
                <div class="alert__icon alert__icon_success">
                    <svg>
                        <use xlink:href="{{ asset('img/icons/icons.svg#IconSuccess') }}"></use>
                    </svg>
                </div>
            </div>

            <h4 class="alert__title">{{ $title }}</h4>
            <p class="alert__subtitle">{{ $description }}</p>
            <button data-close class="alert__btn btn btn_light">{{ __('Закрити') }}</button>
        </div>
    </div>
</div>