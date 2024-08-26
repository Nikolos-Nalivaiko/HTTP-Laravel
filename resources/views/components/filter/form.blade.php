<form action="{{ $action }}" method="{{ $method }}" class="filter__form">

    <div class="filter__header">
        <h4>{{ __('Пошук по філтрам') }}</h4>
        <div class="filter__close">
            <svg>
                <use xlink:href="{{ asset('img/icons/icons.svg#IconClose(Error)') }}"></use>
            </svg>
        </div>
    </div>

    <div class="filter__inner">

        {{ $slot }}
    
    </div>

    <label class="custom-checkbox filter__checkbox">
        <input type="checkbox" name="urgent">
        <span class="checkmark"></span>
        <span class="checkbox-label">Терміновий вантаж</span>
    </label>

    <div class="filter__btns">
        <button type="submit" class="filter__btn btn btn_green">Знайти</button>
        <a href="{{ route('cargo.index') }}" class="filter__btn btn btn_light">Скинути фільтри</a>
    </div>

</form>