@extends('layouts.app')

<style>
    #content{
        background-color: white;
    }

    #sections{
        width: 100%;
        height: 100%;
    }

    #couponsSection{
        padding-top: 10px;
        padding-left: 5em;
        padding-right: 5em;
        height: auto;
    }

    .coupon-item{
        border: 1px solid rgba(0, 0, 0, 0.12);
    }

    .coupon-name-header, .coupon-price-header{
        font-size: 18px;
        padding: 5px;
    }

    .coupon-name, .coupon-price{
        font-size: 16px;
        padding: 5px;
    }

    .coupon-name, .coupon-name-header{
        text-align: left;
    }

    .coupon-discount, .coupon-discount-header{
        text-align: right;
        padding: 5px;
    }

    .div no-content{
        width: 100%;
        height: 100%;
    }

    .coupon-code, .coupon-code-header {
        text-align: center;
        padding: 5px;
    }   


</style>

@section('content')

<div id="content">
    <div id="sections">

        @if($coupons->count() < 1)

            <div class="no-content pt-5">
                <div class="row mt-2 justify-content-center"><h3>Nema kupona</h3></div>
                <div class="row mt-2 justify-content-center">
                    <a href="/coupons/create"><button type="button" class="btn btn-primary">Dodaj Kupon</button></a>
                </div>
            </div>

        @else

        <div id="couponsSection">
            <div class="row justify-content-around coupon-item-header" style="flex-wrap: nowrap;">
                <div class="column col-lg coupon-name-header">Naziv kupona</div>
                <div class="column col-lg coupon-code-header">Kod</div>
                <div class="column col-lg coupon-discount-header">Popust</div>
            </div>
            @foreach($coupons as $coupon)
            <a href="/coupons/{{$coupon->id}}">
                <div class="row justify-content-around coupon-item" style="flex-wrap: nowrap;">
                    <div class="column col-lg coupon-name">{{ $coupon->name }}</div>
                    <div class="column col-lg coupon-code">{{ $coupon->code }}</div>
                    <div class="column col-lg coupon-discount">{{ $coupon->discount }}%</div>
                </div>
            </a>
            @endforeach
        </div>

        <div class="row mt-2 justify-content-center">
            <a href="/coupons/create">
                <button type="button" class="btn btn-primary">Dodaj Kupon</button>
            </a>
        </div>

        @endif
   
    </div>
</div>

@endsection
