@extends('layouts.master')

<style>
    th, td {
        padding: 10px;
        text-align: center;
    }
    th { border-bottom: 2px solid #000; }
    td a {
         display: flex;
        justify-content: center;
        align-items: center;
    }
    td a i { margin-right: 5px;}
</style>

@section('contentAdmin')
<div class="h-screen flex flex-col items-center justify-center container pl-1 lg:pl-0">
    <div class="flex justify-center text-5xl">
        <h3>View Users</h3>
    </div>

    <div class="mt-4">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Delete</th>
                <th>Role</th>
                <th>Change role</td>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $u)
            <tr>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>
                    <a onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this user?')){document.getElementById('delete-user-id-{{ $u->id }}').submit()}" href="#" class="flex justify-center"><i class="fa-solid fa-trash-can"></i></a>    
                        <form id="delete-user-id-{{ $u->id }}" action="{{ route('delete-user', ['id' => $u->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                </td>
                <td>
                    @if($u->role == 1)
                        admin
                    @else
                        user
                    @endif
                </td>

                <td>
                    <a onclick="event.preventDefault(); if(confirm('Are you sure you want to change this user\'s role?')){document.getElementById('change-user-role-id-{{ $u->id }}').submit()}" href="#" class="flex justify-center"><i class="fa-solid fa-user"></i></a>    
                        <form id="change-user-role-id-{{ $u->id }}" action="{{ route('change-user-role', ['id' => $u->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                        </form>
                </td>
                
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>


@endsection