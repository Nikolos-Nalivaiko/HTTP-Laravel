@props([

    'icon' => '',
    'type' => 'text',
    'for' => '',
    'label' => '',
    'showIconEye' => false,
    'value' => ''

    ])

<div class="input__wrapper {{ $type == 'textarea' ? 'input__wrapper_description' : '' }}">
    <div class="input__icon">
        <svg>
            <use xlink:href="{{ $icon }}"></use>
        </svg>
    </div>
    <div class="input__inner">
        <label class="input__label" for="{{ $for }}">{{ $label }}</label>

        @if ($type == 'textarea')
        <textarea {{ $attributes }} id="{{ $for }}" class="textarea"></textarea>
        @else
        
        <input type="{{ $type }}" id="{{ $for }}" class="input" {{ $attributes->merge([

            'value' => old($for, $value)

        ]) }}>
        @endif

        @error( $for )
        <p style="color: red;">{{ $message }}</p>
        @enderror

    </div>
    @if($showIconEye)
        <div class="input__icon-eye">
            <svg>
                <use xlink:href="{{ asset('img/icons/icons.svg#IconPasswordVisible') }}"></use>
            </svg>
        </div>
    @endif
</div>
