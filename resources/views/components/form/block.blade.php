@props([
    
    'title' => ''

    ])

<div class="create-form__block">
    <h4 class="create-form__title">{{ $title }}</h4>
    <div class="create-form__inputs">
        {{ $slot }}
    </div>
</div>