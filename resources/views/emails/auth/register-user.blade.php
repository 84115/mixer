@component('mail::message')
# Introduction

Hi {{ $user->name }},

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
