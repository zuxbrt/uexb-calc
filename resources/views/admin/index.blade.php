@extends('layouts.app')

<style>
    #content{
        background-color: white;
    }

    #sections{
        width: 100%;
    }

    #usersSection{
        padding-top: 10px;
        padding-left: 5em;
        padding-right: 5em;
        height: 100%;
    }

    .user-item{
        border: 1px solid rgba(0, 0, 0, 0.12);
    }

    .user-name-header, .user-email-header{
        padding: 5px;
        font-size: 18px;
    }

    .user-name, .user-email{
        padding: 5px;
        font-size: 16px;
    }

    .user-name, .user-name-header{
        text-align: left;
        padding-left: 5px;
    }

    .user-email, .user-email-header{
        text-align: right;
        padding-right: 5px;
    }

</style>

@section('content')

<div id="content">
    <div id="sections">

        <div id="usersSection">
            <div class="row justify-content-around user-item-header" style="flex-wrap: nowrap;">
                <div class="column col-lg user-name-header">User</div>
                <div class="column col-lg user-email-header">email</div>
            </div>
            @foreach($users as $user)
                <div class="row justify-content-around user-item" style="flex-wrap: nowrap;">
                    <div class="column col-lg user-name">{{ $user->name }}</div>
                    <div class="column col-lg user-email">{{ $user->email }}</div>
                </div>
            @endforeach
        </div>
           
    </div>
</div>

@endsection
