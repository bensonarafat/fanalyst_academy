<x-mail::message>
# Hi

New contact from {{ $data['name'] }}
<br/>
Subject : {{ $data['subject'] }}
Name: {{ $data['name'] }}
Email: {{ $data['email'] }}
Telephone: {{ $data['phone'] }}
Message: {{ $data['message'] }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
