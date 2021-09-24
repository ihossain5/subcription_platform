@component('mail::message')
# {{ $maildata['message'] }} 

Post Title : {{ $maildata['title'] }} <br>
Post Description : {{ $maildata['description'] }} 

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
