<x-mail::message>
# Hi

New Student Registration
<br/>
{{ $data['fullname'] }} just signed up on Fanalyst Academy
Email Address: {{ $data['email'] }}
<br>
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
