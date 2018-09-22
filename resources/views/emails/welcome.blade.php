@component('mail::message')
# Welcome, {{$user->name}},

Thank's for registering at **Share&nbsp;It!**

Your account was created, but you still need to activate it. We've sent you another e-mail and we are ready to go!

And you? Are you ready to Share It with your friends? :)

@component('mail::button', ['url' => 'https://shareit.brunofontes.net'])
Share It!
@endcomponent