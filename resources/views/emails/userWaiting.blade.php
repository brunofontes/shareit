@component('mail::message')
{!! __('Hi, :username,', ['username' => $userWithItem]) !!}


{!! __('Are you still using :itemname?', ['itemname' => $item->name]) !!}


{!! __('We just want to let you know that :waitinguser asked us to be alerted when this item were available.', ['waitinguser' => $waitingUser]) !!}


{!! __('So, if you are not using it anymore, please **Return It** at the website:') !!}


@component('mail::button', ['url' => 'https://shareit.brunofontes.net/home'])
Share It!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent