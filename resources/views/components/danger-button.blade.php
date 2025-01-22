<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-danger mt-2']) }}>
    {{ $slot }}
</button>
