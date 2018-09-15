@component('mail::message')
# Welcome, {{$user->name}},

Thank's for registering at **Share&nbsp;It!**

Your account was created and it is active. And you? Are you ready to Share It with your friends? :)

@component('mail::button', ['url' => 'https://shareit.brunofontes.net'])
Share it!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
