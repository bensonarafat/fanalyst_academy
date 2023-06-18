<x-mail::message>
# Hi

New Instructor Registration
<br/>
{{ $data['fullname'] }} just signed up on Fanalyst Academy
Email Address: {{ $data['email'] }}
<br>
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
