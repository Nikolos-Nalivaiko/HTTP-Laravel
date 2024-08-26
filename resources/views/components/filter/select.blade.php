@props(['title', 'name', 'options'])

<div class="filter__input-wrapper">
    <p for="" class="filter__label-title">{{ $title }}</p>
    <div class="filter__input-block">
        <select name="{{ $name }}" id="{{ $name }}" class="select">
            <option value="" class="select__option" hidden selected></option>
            @foreach ($options as $key => $value)
                <option value="{{ $key }}" class="select__option" {{ request($name) == $key ? 'selected' : '' }}>
                    {{ $value }}
                </option>
            @endforeach
        </select>
    </div>
</div>