@component('mail::message')
Hi, {{$username}},
&nbsp;<br>
&nbsp;<br>
#Good news: {{$item->name}} is available!
&nbsp;<br>
The item <em>{{$item->name}} ({{$item->product->name}})</em> is now available on **Share&nbsp;It**.
&nbsp;<br>
&nbsp;<br>
<a href="https://shareit.brunofontes.net/home">Take it</a> before anyone else.

@endcomponent
