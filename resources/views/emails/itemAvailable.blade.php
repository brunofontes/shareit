@component('mail::message')
Hi, {{$username}},
&nbsp;<br>
&nbsp;<br>
#Good news: {{$item->name}} is available!
&nbsp;<br>
The item <em>{{$item->name}} ({{$item->product->name}})</em> is now available on **Share&nbsp;It**.
&nbsp;<br>
**Take It** before anyone else at the website:

@component('mail::button', ['url' => 'https://shareit.brunofontes.net/home'])
Share It!
@endcomponent

@endcomponent