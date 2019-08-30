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
    
        <!-- custom styles -->
        <link href="{{ asset('css/calc.css') }}" rel="stylesheet" />

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
                margin-top: 22px;
            }

            #navigation-menu{
                padding-top: 30px;
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

                    <div class="form-top-container" 
                    style="width: 90%;
                    margin-left: auto;
                    margin-right: auto;">

                            <div class="mt-2 courses-data" id="availableCoursesDiv" 
                            style="display:flex; flex-direction:row; flex-wrap:nowrap;">
    
                                
                                
                                <div class="singleCourse">
                                    @foreach($courses as $course)

                                    <div class="courseInfo">

                                        <input type="radio" class="courseSelection" id="{{$course->id}}.selected" onclick="toggleClass({{$course->id}})">

                                    <div class="course-block not-selected" id="courseBlock.{{$course->id}}">

                                            <div class="course-column">
                                                <div id="{{$course->id}}">
                                                    {{$course->name}}
                                                </div>
                                            </div>
                        
                                            <div class="range-column">
                                                <div class="custom-range-div">
                                                    <input id="{{$course->id}}.participants" name="polaznicikurs-{{$course->id}}" type='text' class='participants-input @error('polaznici{{$course->id}}kurs') is-invalid @enderror' 
                                                        min="0" max="100" onInput="setParticipants({{$course->id}})" 
                                                        onkeypress="if(event.which &lt; 48 || event.which &gt; 57 ) if(event.which != 8) return false;"
                                                        disabled value="0">
                                                    <div class="label-range">
                                                            <p>Broj polaznika: </span></p>
                                                        </div>
                                                    </div>

                                                    @error('polaznici{{$course->id}}kurs')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                        
                
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
                                        <input id="popustValue" type="text" class="form-control code-input" name="popust"
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
                    
                    </div>






                    <div class="form-bottom-container" style="width: 80%;
                    margin-left: auto;
                    margin-right: auto;">

                            <div class="row mt-5">

                                    <div class="col">
                                        <div class="row ml-2 mr-2">
                                            <label for="name" class="label-text">Ime</label>
                                            <input id="name" type="text" class="form-control form-control-lg text-input @error('name') is-invalid @enderror" 
                                            name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                
                                    <div class="col">
                                        <div class="row ml-2 mr-2">
                                            <label for="prezime" class="label-text">Prezime</label>
                                            <input id="prezime" type="text" class="form-control form-control-lg text-input @error('prezime') is-invalid @enderror" 
                                            name="surname" value="{{ old('prezime') }}"  autocomplete="surname" autofocus>
                
                                            @error('prezime')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="row ml-2 mr-2">
                                            <label for="email" class="label-text">Email</label>
                                            <input id="email" type="email" class="form-control form-control-lg text-input @error('email') is-invalid @enderror" 
                                            name="email" value="{{ old('email') }}"  autocomplete="email">
                                
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
        
                                </div>
                    
                    
                                <div class="row mt-2">
                
                
                                    <div class="col">
                                        <div class="row ml-2 mr-2">
                                            <label for="telefon" class="label-text">Telefon</label>
                                            <input id="telefon" type="text" class="form-control form-control-lg text-input @error('telefon') is-invalid @enderror" 
                                            name="phone" value="{{ old('telefon') }}"  autocomplete="phone" autofocus>
                    
                                            @error('telefon')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="row ml-2 mr-2">
                                            <label for="city" class="label-text">Grad</label>
                                            <input id="city" type="text" class="form-control form-control-lg text-input @error('city') is-invalid @enderror" 
                                            name="city" value="{{ old('city') }}"  autocomplete="city" autofocus>
                        
                                            @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>                        
                                    </div>

                                    <div class="col">
                                        <div class="row ml-2 mr-2">
                                            <label for="city" class="label-text-type">Lice</label>
                                            <input id="personStateInput" type="checkbox" name="person" value="f" onchange="togglePersonType()">
                                            <span id="person-type-1">Pravno</span>
                                            <span id="person-type-2">Fizičko</span>
                                        </div>
                                    </div>
                    
                                </div>
                    
                    
                                <div class="row ml-2 mr-2 justify-content-between" id="company-details">

                                    <div class="row company-info mr-1 ml-1">
                                        <label for="idFirme" class="label-text">ID Firme</label>
                                        <input id="idFirme" type="text" class="form-control form-control-lg text-input @error('idFirme') is-invalid @enderror" 
                                        name="company_id" value="{{ old('idFirme') }}"  autocomplete="company_id" autofocus>
                    
                                        @error('idFirme')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="row company-info mr-1">
                                        <label for="adresaFirme" class="label-text">Adresa Firme</label>
                                        <input id="adresaFirme" type="text" class="form-control form-control-lg text-input @error('adresaFirme') is-invalid @enderror" 
                                        name="company_address" value="{{ old('adresaFirme') }}"  autocomplete="company_adress" autofocus>
                        
                                        @error('adresaFirme')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="row company-info" style="margin-right: 1.2rem!important;">
                                        <label for="odgovornoLice" class="label-text">Odgovorno Lice</label>
                                        <input id="odgovornoLice" type="text" class="form-control form-control-lg text-input @error('odgovornoLice') is-invalid @enderror" 
                                        name="assignee" value="{{ old('odgovornoLice') }}" autocomplete="assignee" autofocus>
                            
                                        @error('odgovornoLice')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                </div>
                
                    
                    
                                <div class="row ml-2 mr-2 mt-0">
                                    <label for="napomene" class="label-text">Napomene</label>
                                    <textarea type="text" id="napomene" class="form-control text-input" style="min-height:100px;" name="notes"></textarea>
                                </div>
        
                                
                            
                    
                                <div class="row justify-content-end">
                                    <button type="submit" class="btn send-request">Pošalji zahtjev</button>
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
        // global variables
        var courseParticipants = [];
        var totalPrice = 0;
        var totalParticipants = 0;



        // toggle active/inactive course
        function toggleClass(id){
            let classList = document.getElementById('courseBlock.'+id).classList;
            
            if (classList.contains("not-selected")) {
                document.getElementById('courseBlock.'+id).classList.remove('not-selected');
                document.getElementById('courseBlock.'+id).classList.add('selected');
                document.getElementById(id+".selected").checked = true;
                document.getElementById(id+".participants").disabled = false;

                this.calculateCoursesPrice(id, true);
                this.setCourseParticipants(id, true);
                this.setParticipants(id);
            } else {
                document.getElementById('courseBlock.'+id).classList.remove('selected');
                document.getElementById('courseBlock.'+id).classList.add('not-selected');
                document.getElementById(id+".selected").checked = false;
                document.getElementById(id+".participants").disabled = true;
            
                this.calculateCoursesPrice(id, false);
                this.setCourseParticipants(id, false);
            }

            this.setTotalParticipants();
        }

        // set participants value for course
        function setParticipants(id) {
            let input = document.getElementById(id+".participants");

            let inputValue = parseInt(input.value);

            if(isNaN(inputValue)){
                courseParticipants[id] = 0;
            } else {
                courseParticipants[id] = inputValue;
            }

            this.setTotalParticipants();
            this.calculateDiscount();
        }

        // change person type
        function togglePersonType(){
            let value = document.getElementById('personStateInput').checked;

            if(value === true){
                document.getElementById('person-type-1').style.color = "#000000";
                document.getElementById('person-type-2').style.color = "white";
                document.getElementById('company-details').style.height = "0";
            } else {
                document.getElementById('person-type-1').style.color = "white";
                document.getElementById('person-type-2').style.color = "#000000";
                document.getElementById('company-details').style.height = "127px";
            }
        }

        // calculate courses price
        function calculateCoursesPrice(courseId, courseAdded){
            document.getElementById('totalPriceValue').classList.add("price-fade");

            let courses = {!! json_encode($courses) !!};
            let coursePrice = 0;
                
            for (const key of Object.keys(courses)) {
                if(courses[key].id === courseId){
                    this.price = courses[key].price;
                }
            }

            if(courseAdded === true){
                totalPrice += parseInt(price);
                // console.log(totalPrice);

            } else {
                totalPrice -= parseInt(price);
                // console.log(totalPrice);
            }

            this.setPrice(totalPrice);
        }

        // calculate total price of course
        function calculateDiscount(){
            let discount = 0;
            let priceWithDiscount = 0;
            let price = totalPrice;

            if(totalParticipants > 1 && totalParticipants <= 2){
                discount = 5;
            } else if(totalParticipants >= 3 && totalParticipants <= 5){
                discount = 10;
            } else if(totalParticipants >= 6 && totalParticipants <= 10){
                discount = 15;
            } else if(totalParticipants >= 11 && totalParticipants <= 15){
                discount = 20;
            } else if(totalParticipants >= 15 && totalParticipants <= 20){
                discount = 25;
            } else if(totalParticipants >= 21){
                discount = 30;
            } else {
                discount = 0;
            }

            if(discount !== 0){
                let discountValue = (discount / 100) * price;
                priceWithDiscount = price - discount;
            } else {
                priceWithDiscount = price;
            }

            document.getElementById('popustValue').value = discount+'%';
            // console.log("Price", priceWithDiscount);
            // console.log('Participants', totalParticipants);
            this.setPrice(priceWithDiscount);
        }

        // set value of course participants
        function setCourseParticipants(id, state){
            if(state !== false){
                // if active it cant be 0
            } else {
                courseParticipants[id] = 0;
            }
        }

        // set total number of participants
        function setTotalParticipants(){
            let count = 0;
            courseParticipants.forEach(element => {
                count += element;
            });

            totalParticipants = count;
        }

        // set courses price
        function setPrice(price){
            document.getElementById('totalPriceValue').innerHTML = price;

            // setTimeout(function(){
            //     document.getElementById('totalPriceValue').classList.toggle("price-fade");
            // }, 1000);
        }



        function setInputFilter(event){
            
        }
        

        

    </script>
</html>
