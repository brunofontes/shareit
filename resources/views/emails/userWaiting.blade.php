@component('mail::message')
Hello, {{$userWithItem}},

Are you still using {{$item->name}}?

We just want to let you know that {{$waitingUser}} asked us to be alerted when this item were available.

So, if you are not using it anymore, please go to our site and...

@component('mail::button', ['url' => 'https://shareit.brunofontes.net/home'])
Return it!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
