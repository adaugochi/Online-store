<div class="{{ $column ?? 'col-12' }}">
    <div class="form-input">
        <input name="{{ $name }}" placeholder="{{ $placeholder }}" {{ $attributes->merge(['type' => 'text']) }}>
        @include('partials.error', ['fieldName' => $fieldName ?? $name])
    </div>
</div>
