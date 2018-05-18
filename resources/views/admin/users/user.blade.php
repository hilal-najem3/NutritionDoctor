@extends('layouts.app')

@section('content')
<link href="{{ asset('css/usersTable.css') }}" rel="stylesheet">
<div class="container">
    {!! Form::open(['action' => ['UserController@update', $user->id], 'method' => 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
        {{ csrf_field() }}        
        <table class="tg">
            <tr>
                <td>First Name:</td>
                <td>
                <input type="text" name='first_name' placeholder="First Name" value={{ $user->first_name }}>
                </td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td>
                    <input type="text" name='last_name' placeholder="Last Name" value={{ $user->last_name }}>
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>
                    <input type="text" name='email' placeholder="Email" value={{ $user->email }}>
                </td>
            </tr>
            <tr>
                <td>Admin</td>
                <td>
                    <input type="checkbox" name="admin" id="admin">
                </td>
            </tr>
            <tr>
                <td>Confirmed:</td>
                <td>
                    @if ($user->confirmed == 1)
                            Yes
                    @else
                            No
                    @endif
                </td>
            </tr>
            <tr>
                <td>Blood Type:</td>
                <td>
                    <select name="blood_type" id="blood_type">
                        @foreach ($bloodTypes as $blt)
                            @if ($blt == $user->blood_type)
                                <option value={{ $blt }} selected>{{ $blt }}</option>
                            @else
                                <option value={{ $blt }}>{{ $blt }}</option>
                            @endif
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Date of Birth:</td>
                <td>
                    <input type="date" name='date_of_birth' placeholder="Date of Birth" value={{ $user->date_of_birth }}>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Update"></td>
                <td><button class="default-danger"><a href="#">Delete</a></button></td>
            </tr>
        </table>
    {!! Form::close() !!}
</div>
@endsection
