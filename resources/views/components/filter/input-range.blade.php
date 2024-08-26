@props(['title', 'name_from', 'name_to', 'type' => 'text'])

<div class="filter__input-wrapper">
    <p for="" class="filter__label-title">{{ $title }}</p>
    <div class="filter__input-block">
        <div class="filter__input-inner">
            <label for="" class="filter__label">від</label>
            <input type="{{ $type }}" name="{{ $name_from }}" class="filter__input" value="{{ request($name_from) }}">
        </div>
        <div class="filter__input-inner">
            <label for="" class="filter__label">до</label>
            <input type="{{ $type }}" name="{{ $name_to }}" class="filter__input" value="{{ request($name_to) }}">
        </div>
    </div>
</div>