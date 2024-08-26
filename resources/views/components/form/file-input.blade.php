<div class="file">
    <label for="{{ $for }}">
        <div class="file__icon">
            <svg>
                <use xlink:href="{{ $icon }}"></use>
            </svg>
        </div>
        <input type="file" id="{{ $for }}" {{ $attributes }}>
        <span class="file__title">{{ $title }}</span>
        <span class="file__subtitle">{{ $subtitle }}</span>
    </label>
</div>