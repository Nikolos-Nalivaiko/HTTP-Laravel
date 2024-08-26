@props([
    'label', 
    'name', 
    'options' => [], 
    'icon', 
    'id' => $name,
    'data_old_city' => ''
])

<div class="input__wrapper">
    <div class="input__icon">
        <svg>
            <use xlink:href="{{ $icon }}"></use>
        </svg>
    </div>
    <div class="input__inner">
        <label class="input__label" for="{{ $name }}">{{ $label }}</label>

        <select 
        name="{{ $name }}" 
        @if($id) id="{{ $id }}" @endif 
        @if($data_old_city) data-old-city="{{ $data_old_city }}" @endif
        class="select">

            <option
            value=""
            class="select__option" 
            hidden
            @if(!old($name)) selected @endif>
            </option>
         
            @foreach ($options as $key => $value)

                <option 
                value="{{ $key }}" 
                class="select__option"
                @if(old($name) == $key) selected @endif>
                {{ $value }}
                </option>
         
                @endforeach
        </select>

        @error( $name )
        <p style="color: red;">{{ $message }}</p>
        @enderror

    </div>
</div>