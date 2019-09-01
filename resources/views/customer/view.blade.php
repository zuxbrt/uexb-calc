@extends('layouts.app')

<style>
    #content{
        background-color: white;
    }

    #sections{
        width: 100%;
        height: 100%;
    }

    .item{
        border-bottom: 1px solid black;
    }

    .info{
        border-bottom: 2px solid black;
        font-weight: 700;
    }

</style>

@section('content')

<div id="content">
    <div id="sections">

                <div class="content p-5">
                        <div class="row info">
                            <div class="col">Naziv</div>
                            <div class="col">Podatci</div>
                        </div>

                        <div class="row item">
                            <div class="col">Ime:</div>
                            <div class="col">{{$customer->name}}</div>
                        </div>

                        <div class="row item">
                            <div class="col">Prezime:</div>
                            <div class="col">{{$customer->surname}}</div>
                        </div>

                        <div class="row item">
                            <div class="col">Email:</div>
                            <div class="col">{{$customer->email}}</div>
                        </div>

                        <div class="row item">
                            <div class="col">Grad:</div>
                            <div class="col">{{$customer->city}}</div>
                        </div>

                        <div class="row item">
                            <div class="col">Cijena kurseva:</div>
                            <div class="col">{{$customer->fee}}</div>
                        </div>

                    
                </div>



            <form action="/customers/{{$customer->id}}" enctype="multipart/form-data" method="POST" style="margin: 0; position: absolute; right: 0;">
                @csrf
                @method('DELETE')
                    <div class="column col-lg">
                        <button type="submit" class="btn btn-danger">Izbrisi Kupca</button>
                    </div>
            </form>
            
    </div>
</div>

@endsection
