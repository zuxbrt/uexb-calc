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
        border: 1px solid black;
        background-color: #fafafa;
    }

    .info{
        border-bottom: 2px solid black;
        border-top: 1px solid black;
        border-left: 1px solid black;
        border-right: 1px solid black;
        background: #c7c7c7;
        font-weight: 700;
    }
    .col{
        font-size: 18px;
        border-left: 1px solid black;
    }

    .padded-adjusted{
        margin-left: -10px;
    }

</style>

@section('content')

<div id="content">
    <div id="sections">

                <div class="content pl-5 pr-5 pt-4">
                        <h3 class="padded-adjusted">Podatci o kupcu</h3>

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

                <div class="content pl-5 pr-5 pt-4">
                    <h3 class="padded-adjusted">Podatci o kursevima</h3>
                    <div class="row info">
                        <div class="col">Naziv kursa</div>
                        <div class="col">Cijena kursa</div>
                        <div class="col">Broj Polaznika</div>
                    </div>
                    @foreach($courses as $singleCourse)
                        <div class="row item">
                            <div class="col">{{$singleCourse['course_name']}}</div>
                            <div class="col">{{$singleCourse['course_price']}}</div>
                            <div class="col">{{$singleCourse['course_participants']}}</div>
                        </div>
                    @endforeach
                </div>


                @if(count($companyInfo) !== 0)
                    <div class="content pl-5 pr-5 pt-4">
                        <h3 class="padded-adjusted">Podatci o kompaniji</h3>
                        <div class="row info">
                            <div class="col">ID Kompanije</div>
                            <div class="col">Adresa kompanije</div>
                            <div class="col">Odgovorno lice</div>
                        </div>

                        <div class="row item">
                            <div class="col">{{$companyInfo['company_id']}}</div>
                            <div class="col">{{$companyInfo['company_address']}}</div>
                            <div class="col">{{$companyInfo['assignee']}}</div>
                        </div>
                    </div>
                @endif



            <form action="/customers/{{$customer->id}}" enctype="multipart/form-data" method="POST" style="margin: 0; position: absolute; right: 0;">
                @csrf
                @method('DELETE')
                    <div class="column col-lg mt-5 mr-5">
                        <button type="submit" class="btn btn-danger">Izbrisi Kupca</button>
                    </div>
            </form>
            
    </div>
</div>

@endsection
