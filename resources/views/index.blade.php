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
                width: 100%;
                overflow: auto;
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

            
        </style>
    </head>
    <body onload="setDivHeight()">

        @if(Route::getCurrentRoute()->uri() == '/')
                    
            <div id="main-header">
                <div id="logoContainer">

                    <a href="http://uciexcel.ba/"><img id="logoImg" src="../images/logo.png"></a>

                    <nav id="navigation-menu-desktop">
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

                <div id="mobile-nav">
                    <img id="mobile-nav-icon" src="../images/menu.svg" onclick="toggleMobileMenu()">
                    <div id="mobile-menu-container"class="not-opened">
                        <div id="navigation-menu-mobile">
                            <ul id="links-ul-mobile" style="list-style-type:none;">
                                <a href="http://uciexcel.ba/#pocetna"><li class="link-menu greytext">Početna</li></a>
                                <a href="http://uciexcel.ba/#onama"><li class="link-menu greytext">O Nama</li></a>
                                <a href="http://uciexcel.ba/#sadrzaj"><li class="link-menu greytext">Vrste treninga</li></a>
                                <a href="http://uciexcel.ba/#cjenovnik"><li class="link-menu greytext">Cjenovnik</li></a>
                                <a class="nohover" href="https://uciexcel.ba/prijavni-obrazac">
                                    <li class="link-menu-button">Prijavi se</li>
                                </a>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>

        @endif

        <div class="flex-center position-ref pt-4">

            <div class="content">
                
                <form action="/" enctype="multipart/form-data" method="post" id="calculateForm">
                    @csrf
                    @method('POST')

                    <div class="form-top-container" id="formTopContainer">

                            <div class="mt-2 courses-data" id="availableCoursesDiv">
    
                                
                                
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
                                        <input id="popustKupon" type="text" class="form-control code-input @error('code') is-invalid @enderror" 
                                        name="code" value="{{ old('code') }}" autocomplete="code" autofocus oninput="validateCouponCode()">
                                        <div class="invalidCoupon" id="invalidCouponAlert">Neispravan kupon</div>
                                        <div class="validCoupon" id="validCouponAlert"></div>
                                    
                                        @error('code')
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
                                <input id="totalPriceValue" type="text" class="form-control code-input" name="fee"
                                    value="0 KM" disabled>

                            </div>
                        

                        <div class="row mt-5" style="width: 100%;">
                            <p class="title" id="titleForma">Forma</p>
                        </div>
                    
                    </div>






                    <div class="form-bottom-container" id="form-bottom">

                            <div class="row mt-5" id="section-one">

                                    <div class="col">
                                        <div class="row input-box">
                                            <label for="name" class="label-text">*Ime</label>
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
                                        <div class="row input-box">
                                            <label for="prezime" class="label-text">*Prezime</label>
                                            <input id="prezime" type="text" class="form-control form-control-lg text-input @error('surname') is-invalid @enderror" 
                                            name="surname" value="{{ old('surname') }}"  autocomplete="surname" autofocus>
                
                                            @error('prezime')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="row input-box">
                                            <label for="email" class="label-text">*Email</label>
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
                    
                    
                                <div class="row mt-2" id="section-two">
                
                
                                    <div class="col">
                                        <div class="row input-box">
                                            <label for="telefon" class="label-text">*Telefon</label>
                                            <input id="telefon" type="text" class="form-control form-control-lg text-input @error('phone') is-invalid @enderror" 
                                            name="phone" value="{{ old('telefon') }}"  autocomplete="phone" autofocus>
                    
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="row input-box">
                                            <label for="city" class="label-text">*Grad</label>
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
                                        <div class="row input-box">
                                            <label for="city" class="label-text-type">Lice</label>
                                            <input id="personStateInput" type="checkbox" name="person" value="f" onchange="togglePersonType()">
                                            <span id="person-type-1">Pravno</span>
                                            <span id="person-type-2">Fizičko</span>
                                        </div>
                                    </div>
                    
                                </div>
                    
                    
                                <div class="row justify-content-between" id="company-details">

                                    <div class="col" id="companyId">
                                    <div class="row company-info">
                                        <label for="idFirme" class="label-text">*ID Firme</label>
                                        <input id="idFirme" type="text" class="form-control form-control-lg text-input @error('idFirme') is-invalid @enderror" 
                                        name="company_id" value="{{ old('idFirme') }}"  autocomplete="company_id" autofocus>
                    
                                        @error('idFirme')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col" id="companyAdress">
                                    <div class="column company-info">
                                        <label for="adresaFirme" class="label-text">*Adresa Firme</label>
                                        <input id="adresaFirme" type="text" class="form-control form-control-lg text-input @error('adresaFirme') is-invalid @enderror" 
                                        name="company_address" value="{{ old('adresaFirme') }}"  autocomplete="company_adress" autofocus>
                        
                                        @error('adresaFirme')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col" id="companyAssignee">
                                    <div class="row company-info">
                                        <label for="odgovornoLice" class="label-text">*Odgovorno Lice</label>
                                        <input id="odgovornoLice" type="text" class="form-control form-control-lg text-input @error('odgovornoLice') is-invalid @enderror" 
                                        name="assignee" value="{{ old('odgovornoLice') }}" autocomplete="assignee" autofocus>
                            
                                        @error('odgovornoLice')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>    

                                </div>
                
                    
                    
                                <div class="row mt-0">
                                    <label for="napomene" class="label-text">Napomene</label>
                                    <textarea type="text" id="napomene" class="form-control text-input" style="min-height:100px; max-height: 200px;" name="notes"></textarea>
                                </div>
        
                                
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            
                    
                                <div class="row justify-content-end">
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display() !!}
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

        $("#person-type-2").click(function() {
            document.getElementById('personStateInput').checked = true;
            document.getElementById('person-type-1').style.color = "#000000";
            document.getElementById('person-type-2').style.color = "white";
            document.getElementById('company-details').style.height = "0";
        }); 

        $("#person-type-1").click(function() {
            document.getElementById('personStateInput').checked = false;
            document.getElementById('person-type-1').style.color = "white";
            document.getElementById('person-type-2').style.color = "#000000";

            if(navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) ||
                navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) ||
                navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/) ||
                navigator.userAgent.match(/Windows Phone/i) || navigator.userAgent.match(/ZuneWP7/i)){

                document.getElementById('company-details').style.height = "390px";
            } else {
                document.getElementById('company-details').style.height = "127px";
            }
            
        }); 

        // toggle active/inactive course
        function toggleClass(id){
            let classList = document.getElementById('courseBlock.'+id).classList;
                        
            // if not selected
            if (classList.contains("not-selected")) {
                document.getElementById('courseBlock.'+id).classList.remove('not-selected');
                document.getElementById('courseBlock.'+id).classList.add('selected');
                document.getElementById(id+".selected").checked = true;
                document.getElementById(id+".participants").disabled = false;
                document.getElementById(id+'.participants').value = 1;

                this.calculateCoursesPrice(id, true);                
                this.setCourseParticipants(id, true);
                this.setParticipants(id);
            } else {
                document.getElementById('courseBlock.'+id).classList.remove('selected');
                document.getElementById('courseBlock.'+id).classList.add('not-selected');
                document.getElementById(id+".selected").checked = false;
                document.getElementById(id+".participants").disabled = true;
                document.getElementById(id+'.participants').value = 0;

                this.calculateCoursesPrice(id, false);
                this.setCourseParticipants(id, false);
                this.setTotalParticipants();
                this.calculateDiscount();
            }

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
            let isDevice = this.checkDevice();

            if(value === true){
                document.getElementById('person-type-1').style.color = "#000000";
                document.getElementById('person-type-2').style.color = "white";
                document.getElementById('company-details').style.height = "0";
            } else {
                document.getElementById('person-type-1').style.color = "white";
                document.getElementById('person-type-2').style.color = "#000000";
                this.setDivHeight();
            }
        }

        // calculate courses price
        function calculateCoursesPrice(courseId, courseAdded){
            document.getElementById('totalPriceValue').classList.add("price-fade");            

            let courses = {!! json_encode($courses) !!};
            //let coursePrice = 0;
                
            for (const key of Object.keys(courses)) {
                //console.log(courseParticipants);
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

            this.setPrice(totalPrice, courseParticipants);
        }

        // set courses price
        function setPrice(price){
            document.getElementById('totalPriceValue').value = price + ' KM';

            setTimeout(function(){ 
                document.getElementById('totalPriceValue').classList.remove("price-fade");
            }, 1000);   
        }

        // calculate total price of course
        function calculateDiscount(couponDiscount){
            let discount = 0;
            let priceWithDiscount = 0;
            let price = totalPrice;

            // set discount percentage
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

            // if coupon discount exists
            if(couponDiscount){
                discount = discount + couponDiscount;
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
        
        // set div height
        function setDivHeight(){
            let isDevice = this.checkDevice();

            if(isDevice === true){
                // alert('mobile');
                document.getElementById('company-details').style.height = "390px";
            } else {
                document.getElementById('company-details').style.height = "127px";
            }
        }

        // check if mobile device
        function checkDevice(){
            if(navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) ||
                navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) ||
                navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/) ||
                navigator.userAgent.match(/Windows Phone/i) || navigator.userAgent.match(/ZuneWP7/i)){
                return true;
            } else {
                return false;
            }
        }

        // toggle mobile menu
        function toggleMobileMenu(){
            let isDevice = this.checkDevice();

            console.log(document.getElementById('mobile-menu-container').classList.contains('not-opened'));

            if(document.getElementById('mobile-menu-container').classList.contains('not-opened')){
                document.getElementById('mobile-menu-container').style.display = "flex";
                document.getElementById('mobile-menu-container').classList.remove('not-opened')
            } else {
                document.getElementById('mobile-menu-container').style.display = "none";
                document.getElementById('mobile-menu-container').classList.add('not-opened');
            }
        }

        // validation of coupon code
        function validateCouponCode(){
            document.getElementById('validCouponAlert').style.display = 'none;';
            document.getElementById('invalidCouponAlert').style.display = 'none;';
            this.calculateDiscount();

            let coupons = {!! json_encode($coupons) !!};
            //console.log(coupons);
            let input = document.getElementById('popustKupon');


            if(input.value.length > 24){
                for (const key of Object.keys(coupons)) {

                    if(totalPrice > 0){
                        if(coupons[key].code === input.value){
                            document.getElementById('validCouponAlert').innerHTML  = coupons[key].name;
                            document.getElementById('validCouponAlert').style.display = 'block';
                            this.calculateDiscount(parseInt(coupons[key].discount));
                        } else {
                            document.getElementById('invalidCouponAlert').style.display = 'block;'
                        }
                    } else {
                        return;
                    }

                }
            } else {
                return;
            }

        }

    </script>
</html>
