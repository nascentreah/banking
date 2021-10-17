@component('mail::message')
{{-- Greeting --}}
Hello **{{ $name }}**,

{{-- Intro Lines --}}
Your Ticket created on {{ config('app.name') }} associated with .

Client _name_ **`{{ $name }}`**, with Ticket _ID_ **`{{ $ticket }}`**, and Subject **`{{ $subject }}`**

has been approved by admin.

{{-- Outro Lines --}}
This ticket was created on `{{ $created_at }}`.

{{-- Salutation --}}
Regards.

{{-- Subcopy --}}
@component('mail::subcopy')
Having trouble clicking the **approve ticket** button?
{{--Copy and paste the URL below into your browser: [`{{ $url }}`]({{ $url }})--}}
@endcomponent
@endcomponent
