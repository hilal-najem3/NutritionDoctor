@extends('layouts.app')

@section('content')
<link href="{{ asset('css/usersTable.css') }}" rel="stylesheet">
<div class="container">
    <div class="move-left">
    <button class="btn btn-default"><a href="/user/create">Add User</a></button>
    </div>
    <br />
    <table class="tg">
        <th class="tg-cemf">Name</th>
        <th class="tg-cemf">Email</th>
        <th class="tg-cemf">Admin</th>
        <th class="tg-cemf">Confirmed</th>
        <th class="tg-cemf">View</th>
        @foreach ($users as $user)
            <tr>
                <td>
                    {{ $user->first_name }} {{ $user->last_name }}
                </td>
                <td>
                    {{ $user->email }}
                </td>
                <td>
                    @if ($user->admin == 1)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td>
                    @if ($user->confirmed == 1)
                            Yes
                    @else
                            No
                    @endif
                </td>
                <td>
                <a href="/user/{{ $user->id }}">View</a>
                </td>
            </tr>   
        @endforeach
    </table>
    <div class="text-center">
        {!! $users->links() !!}
    </div>
</div>
@endsection
