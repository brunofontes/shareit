@component('mail::message')
Hello, {{$userWithItem}},

Are you still using {{$item->name}}?

We just want to let you know that {{$waitingUser}} asked us to be alerted when this item were available.

So, if you are not using it anymore, please **Return It** at the website:

@component('mail::button', ['url' => 'https://shareit.brunofontes.net/home'])
Share It!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent