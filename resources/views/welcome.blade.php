<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Work+Sans&display=swap" rel="stylesheet">

        <!-- Bootstrap 4.0 css -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: white;
                color: black;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                /* padding: 10%; */
                /* padding-bottom: 5%; */
                top: 0;
                width: 100%;
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            #main-header{
                position: relative;
                z-index: 99999;
                width: 100%;
                height: 90px;
                background-color: #fff;
                /* -webkit-box-shadow: 0 1px 0 rgba(0,0,0,.1);
                -moz-box-shadow: 0 1px 0 rgba(0,0,0,.1);
                box-shadow: 0 1px 0 rgba(0,0,0,.1); */
                font-weight: 500;
                line-height: 23px;
                -webkit-box-shadow: 0 1px 0 rgba(0,0,0,.1);
                -moz-box-shadow: 0 1px 0 rgba(0,0,0,.1);
                box-shadow: 0 1px 0 rgba(0,0,0,.1);
            }

            #logoContainer{
                display: flex;
                flex-direction: row;
                flex-wrap: nowrap;
                width: 80%;
                max-width: 1080px;
                margin: auto;
            }

            #logoImg{
                width: 250px;
                height: auto;
                margin-top: 25px;
            }

            #navigation-menu{
                padding-top: 33px;
                display: flex;
                flex-direction: row;
                flex-wrap: nowrap;
                margin-left: auto;
                margin-right: 0;
            }

            #links-ul{
                display: flex;
                flex-direction: row;
                flex-wrap: nowrap;
            }

            .link-menu, .link-menu-button{
                margin-left: 15px;
                margin-right: 15px;
                cursor: pointer;
                font-family: 'Work Sans',Helvetica,Arial,Lucida,sans-serif;
                font-weight: 600;
            }

            .link-menu{
                padding-top: 5px;
            }

            .greytext{
                color: rgba(0,0,0,.6);
            }

            .link-menu-button{
                color: white;
            }

            .greytext, .link-menu-button{
                font-size: 16px;
            }

            .link-menu-button{
                background-color: #73ae56;
                width: 125px;
                height: 35px;
                padding-left: 28px;
                padding-top: 6px;
                border-radius: 25px;
                -webkit-box-shadow: 0 1px 0 rgba(0,0,0,.1);
                -moz-box-shadow: 0 1px 0 rgba(0,0,0,.1);
                box-shadow: 0 1px 0 rgba(0,0,0,.1);
            }

            .nohover:hover{
                text-decoration: none;
            }
            
            .singleCourse{
                position: relative;
                display: flex;
                flex-direction: column;
                width: 66%;
            }

            .not-selected{
                display: flex;
                flex-direction: row;
                filter: contrast(60%);
                width: 100%;
            }

            .courseInfo{
                display: flex;
                flex-direction: row;
                flex-wrap: nowrap;
            }

            .range-column{
                display: flex;
                flex-direction: column;
                flex-wrap: nowrap;
                margin-left: 20px;
            }

            .course-column{
                text-align: center;
                background-color: #73ae56;
                height: 75px;
                padding-top: 25px;
                width: 50%;
                margin-bottom: 20px;
                color: white;
                font-weight: 600;
                -webkit-box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
                -moz-box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
                box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
                border-radius: 30px;
            }


            /* RADIO CHECK STYLES */

            input[type='radio'] {
                margin-top: 22px;
                margin-right: 10px;
                text-decoration: none;
                width: 30px;
                height: 30px;
                border-radius: 30px;
                top: -1px;
                left: -1px;
                position: relative;
                background-color: #d1d3d1;
                content: '';
                display: inline-block;
                visibility: visible;
                border: 2px solid #73ae56;
            }

            input[type='radio']:after {
                text-decoration: none;
                width: 30px;
                height: 30px;
                border-radius: 30px;
                top: -2px;
                left: -2px;
                position: relative;
                background-color: white;
                content: '';
                display: inline-block;
                visibility: visible;
                border: 2px solid #73ae56;
            }

            input[type='radio']:checked:after {
                text-decoration: none;
                width: 30px;
                height: 30px;
                border-radius: 30px;
                top: -2px;
                left: -2px;
                position: relative;
                background-color: #73ae56;
                content: '';
                display: inline-block;
                visibility: visible;
                border: 2px solid #73ae56;
            }


            .custom-range-div{
                width: 33%;
                position: relative;
            }




            /* RADIO RANGE STYLES */

            /* Desperate to remove focus outline in firefox */
            ::-moz-focus-inner {
                outline:0;
            }

            :focus {
                outline:0;
            }

            .range-input,
            .custom-range-input,
            .custom-range-input--vertical {
                min-width: 350px;
                padding: 0;
                margin: 0;
                background: transparent;
                border: none;
                box-sizing: border-box;
                background-clip: padding-box;
                vertical-align: top;
                outline: none;
                -webkit-box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
                -moz-box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
                box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
                border-radius: 30px;
                -webkit-appearance: none;
            }


            /* 
            Declarations get duplicated because an invalid selector
            invalidates the entire declaration block
            */

            .range-input::-webkit-slider-thumb,
            .custom-range-input::-webkit-slider-thumb,
            .custom-range-input--vertical::-webkit-slider-thumb {
            cursor: pointer;
                -webkit-appearance: none;
            }

            .range-input::-moz-range-thumb,
            .custom-range-input::-moz-range-thumb,
            .custom-range-input--vertical::-moz-range-thumb {
                cursor: pointer;
            }

            .custom-range-input,
            .custom-range-input--vertical {
                border-radius: 6px;
                border: 3px solid #73ae56;
                background: white;
                height: 75px;
                border-radius: 30px;
            }

            .custom-range-input::-moz-range-track,
            .custom-range-input--vertical::-moz-range-track {
                border-radius: 6px;
                background: #d3d7d7;
                height: 75px;
                border-radius: 30px;
            }

            /* 
            Declarations get duplicated because an invalid selector
            invalidates the entire declaration block
            */

            .custom-range-input::-webkit-slider-thumb,
            .custom-range-input--vertical::-webkit-slider-thumb {
                height: 75px;
                width: 70px;
                /* border-radius: 6px; */
                background: #73ae56;
                border-radius: 30px;
            }

            .custom-range-input::-moz-range-thumb,
            .custom-range-input--vertical::-moz-range-thumb {
                height: 75px;
                /* width: 100%; */
                /* border-radius: 6px;  */
                background: white;
                border-radius: 30px;
            }

            .custom-range-input--vertical {
            -webkit-transform:rotate(90deg);
            -moz-transform:rotate(90deg);
            -ms-transform:rotate(90deg);  
                transform:rotate(90deg);  
            }

            /*
            Active state
            */

            .custom-range-input:active::-webkit-slider-thumb,
            .custom-range-input--vertical:active::-webkit-slider-thumb {
                border: 1px solid #0940fd;
                box-shadow: 0 0 0 2px #6fb5f1;
            }

            input[type=range]:active::-moz-range-thumb {
                border: 1px solid #0940fd;
                box-shadow: 0 0 0 2px #6fb5f1;
            }

            .label-range{
                text-align: center;
                position: absolute;
                width: 200px;
                top: 25px;
                left: 90px;
                color: rgba(0,0,0,.6);
                font-weight: 600;
                z-index: 50;
            }

            #discountContainer{
                width: 30%;
                position: relative;
                display: flex;
                flex-direction: column;
                flex-wrap: nowrap;
            }
            
            .code-box, .percentage-box{
                width: 100%;
                min-height: 230px;
                -webkit-box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
                -moz-box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
                box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
                border-radius: 30px;
            }

            .code-box{
                display: flex;
                flex-direction: column;
                flex-wrap: nowrap;
                margin-top: 2%;
                margin-left: 5%;
                padding: 30px;
                padding-top: 60px;
                text-align: left;
            }

            .percentage-box{
                display: flex;
                flex-direction: column;
                flex-wrap: nowrap;
                padding: 30px;
                padding-top: 40px;
                text-align: left;
                margin-top: 8%;
                margin-left: 5%;
            }

            .code-input, #popustValue{
                height: 65px;
                border: 3px solid #73ae56;
                background: white;
                border-radius: 30px;
                outline: none;
            }

            .code-input{
                margin-top: 35px;
            }

            #popustValue{
                margin-top: 55px;
            }

            .popustValue:disabled{
                background-color: white !important;
            }

            .code-input:active{
                outline: none;
            }

            .kupon-text, .popust-text{
                height: 20px;
                margin-bottom: 0;
                padding-bottom: 0;
                color: rgba(0,0,0,.6);
                font-weight: 600;
            }

            #priceContainer{
                display: flex;
                width: 95%;
                margin-left: auto;
                margin-right: auto;
                height: 100px;
                flex-direction: row;
                flex-wrap: nowrap;
                justify-content: space-between;
                -webkit-box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
                -moz-box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
                box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
                border: 3px solid rgba(0, 0, 0, 0.03);
                border-radius: 30px;
            }

            #totalPrice{
                text-align: center;
                background-color: #73ae56;
                height: 50px;
                padding-top: 15px;
                width: 250px;
                margin: 25px;
                color: white;
                font-weight: 600;
                border-radius: 30px;
            }

            .totalText{
                height: 50px;
                padding-top: 35px;
                padding-left: 25px;
                margin-bottom: 0;
                padding-bottom: 0;
                color: rgba(0,0,0,.6);
                font-weight: 600;
            }

            .title{
                position: relative;
                margin-left: auto;
                margin-right: auto;
                color: #73ae56;
                font-weight: 500;
                font-family: 'Work Sans',Helvetica,Arial,Lucida,sans-serif;
            }

            .title:after{
                content: ""; /* This is necessary for the pseudo element to work. */ 
                display: block; /* This will put the pseudo element on its own line. */
                margin: 0 auto; /* This will center the border. */
                width: 75%; /* Change this to whatever width you want. */
                padding-top: 15px; /* This creates some space between the element and the border. */
                border-bottom: 2px solid #73ae56; /* This creates the border. Replace black with whatever color you want. */
            }

        </style>
    </head>
    <body>

        @if(Route::getCurrentRoute()->uri() == '/')
                    
            <div id="main-header">
                <div id="logoContainer">

                    <a href="http://uciexcel.ba/"><img id="logoImg" src="../images/logo.png"></a>

                    <nav id="navigation-menu">
                        <ul id="links-ul" style="list-style-type:none;">
                            <a href="http://uciexcel.ba/#pocetna"><li class="link-menu greytext">Početna</li></a>
                            <a href="http://uciexcel.ba/#onama"><li class="link-menu greytext">O Nama</li></a>
                            <a href="http://uciexcel.ba/#sadrzaj"><li class="link-menu greytext">Vrste treninga</li></a>
                            <a href="http://uciexcel.ba/#cjenovnik"><li class="link-menu greytext">Cjenovnik</li></a>
                            <a class="nohover" href="https://uciexcel.ba/prijavni-obrazac">
                                <li class="link-menu-button">Prijavi se</li>
                            </a>
                        </ul>
                    </nav>

                </div>

            </div>

        @endif

        <div class="flex-center position-ref pt-4">

            <div class="content">
                
                <form action="/" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('POST')

                    <div class="formContent pl-5 pr-5">

                            <div class="mt-2" id="availableCoursesDiv" 
                            style="display:flex; flex-direction:row; flex-wrap:nowrap;">
    
                                
                                
                                <div class="singleCourse">
                                    @foreach($courses as $course)

                                    <div class="courseInfo">

                                        <input type="radio" class="courseSelection" id="{{$course->id}}.selected">

                                        <div class="not-selected">

                                            <div class="course-column">
                                                <div id="{{$course->id}}">
                                                    {{$course->name}}
                                                </div>
                                            </div>
                        
                                            <div class="range-column">
                                                <div class="custom-range-div">
                                                    <input id="{{$course->id}}.slider" name="polaznici" type='range' class='custom-range-input' 
                                                        min="0" max="100" onchange="addRange({{$course->id}})" disabled value="0">
                                                        <div class="label-range"
                                                            style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none;" 
                                                            unselectable="on"
                                                            onselectstart="return false;" 
                                                            onmousedown="return false;">
                                                                <p>Broj polaznika: <span id="{{$course->id}}.sliderValue">0</span></p>
                                                            </div>
                                                        </div>
                                                        
                                                        {{-- <input id="polaznici1kurs" type="text" class="form-control form-control-lg @error('polaznici1kurs') is-invalid @enderror" 
                                                        name="polaznici1kurs" value="{{ old('polaznici1kurs') }}" placeholder="Broj polaznika" autocomplete="polaznici1kurs" autofocus>
                                                        
                                                        @error('polaznici1kurs')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror --}}
                
                                                </div>

                                        </div>

                                    </div>

                                    @endforeach

                                </div>

                                <div id="discountContainer">

                                    <div class="row code-box">
                                        <label class="kupon-text" for="popustKupon">Kod posebnog popusta:</label>
                                        <input id="popustKupon" type="text" class="form-control code-input @error('popustKupon') is-invalid @enderror" 
                                        name="popustKupon" value="{{ old('popustKupon') }}" autocomplete="popustKupon" autofocus>
                                    
                                        @error('popustKupon')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
        
                                    <div class="row percentage-box">
                                        <label class="popust-text">Za odabrane treninge i broj prijavljenih polaznika, ostvarujete popust od:</label>
                                        <input id="popustValue" type="text" class="form-control code-input" 
                                        style="text-align:center; background-color: white !important; font-weight: 600; font-size: 20px;"
                                        value="0%" disabled>
                                    </div>
    
                                </div>

    
                            </div>
                            
                            <div class="mt-2" id="priceContainer">
                                <p class="totalText">Ukupna vrijednost predračuna sa ostvarenim popustima iznosi:</p>
                                <div id="totalPrice">
                                    <span id="totalPriceValue">0,00</span> KM
                                </div>
                            </div>
                        

                        <div class="row mt-5" style="width: 100%;">
                            <p class="title">Forma</p>
                        </div>

                        <div class="row mt-5">

                            <div class="col">
                                <label for="name">Ime</label>
                                <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                name="ime" value="{{ old('name') }}"  autocomplete="ime" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
        
                            <div class="col">
                                <label for="prezime">Prezime</label>
                                <input id="prezime" type="text" class="form-control form-control-lg @error('prezime') is-invalid @enderror" 
                                name="prezime" value="{{ old('prezime') }}"  autocomplete="prezime" autofocus>
    
                                @error('prezime')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
            
            
                        <div class="row mt-2">
        
                            <div class="col-md-6">

                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                name="email" value="{{ old('email') }}"  autocomplete="email">
            
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    
                            </div>
        
                            <div class="col">
                                <label for="telefon">Telefon</label>
                                <input id="telefon" type="text" class="form-control form-control-lg @error('telefon') is-invalid @enderror" 
                                name="telefon" value="{{ old('telefon') }}"  autocomplete="telefon" autofocus>
    
                                @error('telefon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
            
                        </div>
            
            
                        <div class="row mt-4 justify-content-around">
            
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lice" id="radio2" value="pravno" checked>
                                <label class="form-check-label" for="radio2">
                                    <h6 class="pt-1">Pravno Lice</h6>
                                </label>
                            </div>
            
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lice" id="radio1" value="fizicko" >
                                <label class="form-check-label" for="radio1">
                                    <h6 class="pt-1">Fizicko Lice</h6>
                                </label>
                            </div>
            
                        </div>
            
                        <div class="row pt-1 pl-3 pr-3">
                            <label for="idFirme">ID Firme</label>
                            <input id="idFirme" type="text" class="form-control form-control-lg @error('idFirme') is-invalid @enderror" 
                            name="idFirme" value="{{ old('idFirme') }}"  autocomplete="idFirme" autofocus>
    
                            @error('idFirme')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
            
                        <div class="row pt-1 pl-3 pr-3">
                            <label for="adresaFirme">Adresa Firme</label>
                            <input id="adresaFirme" type="text" class="form-control form-control-lg @error('adresaFirme') is-invalid @enderror" 
                            name="adresaFirme" value="{{ old('adresaFirme') }}"  autocomplete="adresaFirme" autofocus>
        
                            @error('adresaFirme')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
            
                        <div class="row pt-1 pl-3 pr-3">
                            <label for="odgovornoLice">Odgovorno Lice</label>
                            <input id="odgovornoLice" type="text" class="form-control form-control-lg @error('odgovornoLice') is-invalid @enderror" 
                            name="odgovornoLice" value="{{ old('odgovornoLice') }}" autocomplete="odgovornoLice" autofocus>
            
                            @error('odgovornoLice')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
            
                        <div class="row mt-1 pl-3 pr-3">
                            <label for="napomene">Napomene</label>
                            <textarea type="text" id="napomene" class="form-control" style="min-height:100px;"></textarea>
                        </div>

                        
                        

                        {{-- <div class="row mt-2">
                            <div class="col">
                                <label for="kurs2">Kurs:</label>
                                <select class="form-control form-control-lg" id="kurs2" name="kurs2">
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                
                            <div class="col">
                                <label for="polaznici2kurs">Broj Polaznika</label>
                                <input id="polaznici2kurs" type="text" class="form-control form-control-lg @error('polaznici2kurs') is-invalid @enderror" 
                                name="polaznici2kurs" value="{{ old('polaznici2kurs') }}" autocomplete="polaznici2kurs" autofocus>
                        
                                @error('polaznici2kurs')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
            
                        <div class="row justify-content-end pt-4 mr-1">
                            <button type="submit" class="btn btn-primary">Posalji zahtjev</button>
                        </div>

                    </div>

                </form>


            </div>
        </div>
    </body>



    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
        

        function addRange(id) {
            console.log(id);
            let slider = document.getElementById(id+".slider");
            let output = document.getElementById(id+".sliderValue");
            output.innerHTML = slider.value;

            slider.oninput = function() {
                output.innerHTML = this.value;
            }
            let rangeValue = parseInt(slider.value)
            slider.value = rangeValue + 1
        
        }

        function addNamedRange(itemName) { 
            if(slider.attributes['data-ref-' + itemName]) { return } 
                slider.setAttribute('data-ref-' + itemName, true) 
                let rangeValue = parseInt(slider.value) 
                slider.value = rangeValue + 1
        }
    </script>
</html>
