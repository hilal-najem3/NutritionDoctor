@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Welcome to admin view: {{ $user->first_name }} {{ $user->last_name }}</h2>
    <br />
    <ul>
        <li><a href='{{ url('users') }}'>Manage Users</a></li>
        <li><a href='{{ url('food') }}'>Manage Food</a></li>
        <li><a href='{{ url('prescriptions') }}'>Manage Prescriptions</a></li>
    </ul>
</div>
@endsection
