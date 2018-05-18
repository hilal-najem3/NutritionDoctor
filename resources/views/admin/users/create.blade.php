@extends('layouts.app')

@section('content')
<link href="{{ asset('css/usersTable.css') }}" rel="stylesheet">
<div class="container">
    {!! Form::open(['action' => ['UserController@store'], 'method' => 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
        {{ csrf_field() }}        
        <table class="tg">
            <tr>
                <td>First Name:</td>
                <td>
                    <input type="text" name='first_name' placeholder="First Name">
                </td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td>
                    <input type="text" name='last_name' placeholder="Last Name">
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>
                    <input type="text" name='email' placeholder="Email">
                </td>
            </tr>
            <tr>
                <td>Admin</td>
                <td>
                    <input type="checkbox" name="admin" id="admin">
                </td>
            </tr>
            <tr>
                <td>Blood Type:</td>
                <td>
                    <select name="blood_type" id="blood_type">
                        <option value=""></option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Date of Birth:</td>
                <td>
                    <input type="date" name='date_of_birth' placeholder="Date of Birth">
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Create"></td>
            </tr>
        </table>
    {!! Form::close() !!}
</div>
@endsection
