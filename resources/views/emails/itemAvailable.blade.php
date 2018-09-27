@component('mail::message')
{!! __('Hi, :username,', ['username' => $username]) !!}


#{!! __('Good news: :itemname is available!', ['itemname' => $item->name]) !!}


{!! __('The item <em>:itemname (:productname)</em> is now available on **Share&nbsp;It**.', ['itemname' => $item->name, 'productname' => $item->product->name]) !!}


{!! __('**Take It** before anyone else at the website:') !!}


@component('mail::button', ['url' => 'https://shareit.brunofontes.net/home'])
{{ config('app.name') }}
@endcomponent

@endcomponent