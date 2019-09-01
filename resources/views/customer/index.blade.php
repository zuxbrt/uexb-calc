@extends('layouts.app')

<style>
    #content{
        background-color: white;
    }

    #sections{
        width: 100%;
        height: 100%;
    }

    #customersSection{
        padding-top: 10px;
        padding-left: 5em;
        padding-right: 5em;
        height: auto;
    }

    .customer-item{
        border: 1px solid rgba(0, 0, 0, 0.12);
    }

    .customer-info-column,{
        padding: 5px;
        font-size: 18px;
    }

    .course-name, .course-price{
        padding: 5px;
        font-size: 16px;
    }

    .course-name, .course-name-header{
        text-align: left;
        padding-left: 5px;
    }

    .course-price, .course-price-header{
        text-align: right;
        padding-right: 5px;
    }

    .div no-content{
        width: 100%;
        height: 100%;
    }

    .delete-button{
        padding: 0;
        padding-left: 5px;
        padding-right: 5px;
        margin: 0;
        height: 23px;
        width: auto;
        background: red;
        color: white;
        font-weight: bold;
    }


</style>

@section('content')

<div id="content">
    <div id="sections">

        @if($customers->count() < 1)

            <div class="no-content pt-5">
                <div class="row mt-2 justify-content-center"><h3>Nema kupaca.</h3></div>
            </div>

        @else

        <div id="customersSection">
            <div class="row justify-content-around course-item-header" style="flex-wrap: nowrap;">
                <div class="column col-lg customer-info-column">Ime kupca</div>
                <div class="column col-lg customer-info-column">Prezime kupca</div>
                <div class="column col-lg customer-info-column">e-mail</div>
                <div class="column col-lg customer-info-column">Cijena Kurseva</div>
            </div>
            @foreach($customers as $customer)
            <a href="/customers/{{$customer->id}}">
                <div class="row justify-content-around customer-item" style="flex-wrap: nowrap; position:relative;">
                    <div class="column col-lg customer-data">{{ $customer->name }}</div>
                    <div class="column col-lg customer-data">{{ $customer->surname }}</div>
                    <div class="column col-lg customer-data">{{ $customer->email }}</div>
                    <div class="column col-lg customer-data">{{ $customer->fee }}</div>
                </div>
            </a>
            @endforeach
        </div>

        @endif
   
    </div>
</div>

@endsection
