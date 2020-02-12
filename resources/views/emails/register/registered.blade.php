@component('mail::message')
# Introduction

Hello {{$data['name']}}
<hr>
{{$data['message']}}
@component('mail::button', ['url' => 'http://edjuma_frontend.berg',])
View more jobs
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
