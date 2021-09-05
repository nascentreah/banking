@component('mail::message')
{{-- Greeting --}}
Hello **{{ $name }}**,

{{-- Intro Lines --}}
A Ticket has been created on {{ config('app.name') }} associated with .

Client _name_ **`{{ $name }}`**, and you'll need to approve the Ticket.

with Ticket _ID_ **`{{ $ticket }}`**, and Subject **`{{ $subject }}`**.

{{-- Action Button --}}
{{--@component('mail::button', ['color' => 'green'])--}}
Approve Ticket
{{--@endcomponent--}}

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
