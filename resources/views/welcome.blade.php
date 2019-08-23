<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Bootstrap 4.0 css -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #1b5e20;
                color: white;
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
                margin-top: 7%;
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
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                
                <form action="/" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('POST')

                    <div class="formContent mt-5">
                        
                        <div class="row">

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
            
                        <div class="row pt-1 pl-3 pr-3">
                            <label for="popustKupon">Kupon za popust</label>
                            <input id="popustKupon" type="text" class="form-control form-control-lg @error('popustKupon') is-invalid @enderror" 
                            name="popustKupon" value="{{ old('popustKupon') }}" autocomplete="popustKupon" autofocus>
                
                            @error('popustKupon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
            
                        <div class="row mt-1 pl-3 pr-3">
                            <label for="napomene">Napomene</label>
                            <textarea type="text" id="napomene" class="form-control" style="min-height:100px;"></textarea>
                        </div>

                        <div class="row mt-2">
                            <div class="col">
                                <label for="kurs1">Kurs:</label>
                                <select class="form-control form-control-lg" id="kurs1" name="kurs1">
                                    @foreach($courses as $course)
                                        <option value="{{ $course }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>
            
                            <div class="col">
                                <label for="polaznici1kurs">Broj Polaznika</label>
                                <input id="polaznici1kurs" type="text" class="form-control form-control-lg @error('polaznici1kurs') is-invalid @enderror" 
                                name="polaznici1kurs" value="{{ old('polaznici1kurs') }}" autocomplete="polaznici1kurs" autofocus>
                        
                                @error('polaznici1kurs')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col">
                                <label for="kurs2">Kurs:</label>
                                <select class="form-control form-control-lg" id="kurs2" name="kurs2">
                                    @foreach($courses as $course)
                                        <option value="{{ $course }}">{{ $course->name }}</option>
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
                        </div>
            
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

</html>
