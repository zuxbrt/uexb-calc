@extends('layouts.app')

<style>
    #contentDashboard{
        background-color: white;
    }


</style>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Admin Dashboard
                        Broj kurseva, info o customerima.
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
