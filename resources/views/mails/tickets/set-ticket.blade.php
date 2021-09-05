@component('mail::message')
{{-- Greeting --}}
{{--Hello **{{ $first_name }}**,--}}

{{-- Intro Lines --}}
An account has been created for you on {{ config('app.name') }} associated with .

Your _username_ is **`{{ $name }}`**, and you'll need to set a password to access your account.

{{-- Action Button --}}
{{--@component('mail::button', ['color' => 'green'])--}}
{{--Set password--}}
{{--@endcomponent--}}

{{-- Outro Lines --}}
This password set link will expires on `{{ $created_at }}`.

{{-- Salutation --}}
Regards.

{{-- Subcopy --}}
@component('mail::subcopy')
Having trouble clicking the **set password** button?
{{--Copy and paste the URL below into your browser: [`{{ $url }}`]({{ $url }})--}}
@endcomponent
@endcomponent
