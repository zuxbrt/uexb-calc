@extends('layouts.app')

<style>
    #content{
        background-color: white;
    }

    #sections{
        width: 100%;
    }

    #coursesSection{
        padding-top: 10px;
        padding-left: 5em;
        padding-right: 5em;
        height: 100%;
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


</style>

@section('content')

<div id="content">
    <div id="sections">

        <div id="coursesSection">
            <div class="row justify-content-around course-item-header" style="flex-wrap: nowrap;">
                <div class="column col-lg course-name-header">Naziv kursa</div>
                <div class="column col-lg course-price-header">Cijena</div>
            </div>
            @foreach($courses as $course)
                <div class="row justify-content-around course-item" style="flex-wrap: nowrap;">
                    <div class="column col-lg course-name">{{ $course->name }}</div>
                    <div class="column col-lg course-price">{{ $course->price }}</div>
                </div>
            @endforeach
        </div>
   
    </div>
</div>

@endsection
