<div class="search">
    <div class="search__form-wrapper">
        <form action="{{ $action }}" method="get" class="search__form">
           
            <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            class="search__input"
            placeholder="Введіть назву вантажу">

            <button type="submit" class="search__form-btn">{{ __('Пошук') }}</button>
        </form>

        <div class="search__filter">
            <svg>
                <use xlink:href="{{ asset('img/icons/icons.svg#IconFilter') }}"></use>
            </svg>
        </div>
    </div>

    <a href="" class="search__link">
        <svg>
            <use xlink:href="{{ asset('img/icons/icons.svg#IconPlus') }}"></use>
        </svg>
        {{ __('Додати вантаж') }}
    </a>
</div>