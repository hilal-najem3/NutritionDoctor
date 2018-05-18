Hi {{ $first_name }} {{ $last_name }},
<p>Your registration is completed please click on the link to access: </p>

{{ route('confirmation', $token) }}