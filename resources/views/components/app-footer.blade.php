@php
    $version = (string) config('version.app');
@endphp
<footer {{ $attributes->merge(['class' => 'text-muted-foreground']) }}>
    &copy; {{ date('Y') }} Personal Alternative Funeral Services Limited &middot; v{{ $version }}
</footer>
