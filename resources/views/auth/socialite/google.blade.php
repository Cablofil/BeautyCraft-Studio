<x-filament::button
    :href="route('socialite.redirect', 'google')"
    tag="a"
    color="info"
    
>
{{ __('auth.sign_in_with_google') }}
{{-- Sign in with Google --}}
</x-filament::button>