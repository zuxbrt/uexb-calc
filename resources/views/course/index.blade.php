@extends('layouts.app')

<style>
    #content{
        background-color: white;
    }

    #sections{
        width: 100%;
        height: 100%;
    }

    #coursesSection{
        padding-top: 10px;
        padding-left: 5em;
        padding-right: 5em;
        height: auto;
    }

    .course-item{
        border: 1px solid rgba(0, 0, 0, 0.12);
    }

    .course-name-header, .course-price-header{
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


</style>

@section('content')

<div id="content">
    <div id="sections">

        @if($courses->count() < 1)

            <div class="no-content pt-5">
                <div class="row mt-2 justify-content-center"><h3>Nema kurseva.</h3></div>
                <div class="row mt-2 justify-content-center">
                    <a href="/courses/create"><button type="button" class="btn btn-primary">Dodaj Kurs</button></a>
                </div>
            </div>

        @else

        <div id="coursesSection">
            <div class="row justify-content-around course-item-header" style="flex-wrap: nowrap;">
                <div class="column col-lg course-name-header">Naziv kursa</div>
                <div class="column col-lg course-price-header">Cijena</div>
            </div>
            @foreach($courses as $course)
            <a href="/courses/{{$course->id}}">
                <div class="row justify-content-around course-item" style="flex-wrap: nowrap;">
                    <div class="column col-lg course-name">{{ $course->name }}</div>
                    <div class="column col-lg course-price">{{ $course->price }}</div>
                </div>
            </a>
            @endforeach
        </div>

        <div class="row mt-2 justify-content-center">
            <a href="/courses/create"><button type="button" class="btn btn-primary">Dodaj Kurs</button></a>
        </div>

        @endif
   
    </div>
</div>

@endsection
