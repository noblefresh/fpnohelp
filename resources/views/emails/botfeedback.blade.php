@component('mail::message')
# BOT FEEDBACK

Hello, I just a got a feedback to your question now, kindly check our chats.

@component('mail::button', ['url' => ''])
Check Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
