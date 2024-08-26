<div {{ $attributes->class([

    'form-image'

]) }} >
    {{ $slot }}
    <div class="form-image__close">
        <svg>
            <use xlink:href="{{ asset('img/icons/icons.svg#IconClose(Error)') }}"></use>
        </svg>
    </div>
</div>