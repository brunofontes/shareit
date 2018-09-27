@component('mail::message')
# @lang('Welcome, :username,', ['username' => $user->name])


@lang("Thank's for registering at **Share It!**")


@lang("Your account was created, but you still need to activate it. We've sent you another e-mail and we are ready to go!")


@lang("And you? Are you ready to Share It with your friends?")


@component('mail::button', ['url' => 'https://shareit.brunofontes.net'])
{{ config('app.name') }}
@endcomponent
@endcomponent