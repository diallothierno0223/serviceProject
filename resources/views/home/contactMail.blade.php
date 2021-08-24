@component('mail::message')
# Bonjour

vous avez recu un email de {{$data['first_name']}} et sont mail est {{$data['email']}}
# voici le message:

{{$data['comments']}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent