
<title>Predracun</title>
</head>

<style>
        #contentDashboard{
            background-color: green;
        }

        .column{
            display: flex;
            flex-direction: column;
            flex-wrap: none;
        }

        .row{
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
        }

        .around {
            justify-content: space-between;
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .bold{
            font-weight: 700;
            font-size: 19px;
        }

        .lightBold{
            font-weight: 500;
        }

        .fat-line{
            height: 4px;
            background: black;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .thin{
            height: 3px;
            background: black;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        #info-main{
            margin-top: 20px;
            width: 100%;
        }

        .line-separator{
            background: black;
            height: 4px;
            margin-top: 8px;
            width: 80%;
        }

        .separated{
            width: 50%;
            margin-left: 20px;
            margin-right: 20px;
        }

        .info-item{
            margin: 0;
            padding: 0;
            line-height: 1;
            font-weight: bolder;
            font-size: 21px;
            margin-left: 20px;
            margin-right: 20px;
        }

        #topContent{
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
        }

        .padded-left, .padded-right{
            padding-left: 20px;
            padding-right: 20px;
            width: 50%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .colored-text, .uncolored-text{
            margin: 0;
            padding: 0;
            line-height: 1;
            width: 120px;
            font-size: 18px;
        }

        .uncolored-text-full{
            margin: 0;
            padding: 0;
            line-height: 1;
            /* min-width: 100%; */
            border-bottom: 1px solid black;
            width: 150px;
            text-align: left;
            font-size: 18px;
        }

        .colored-text{
            color: #73ae56;
            text-align: right;
            padding-right: 5px;
            width: 150px;
        }

        .uncolored-text{
            text-align: left;
            border-bottom: 1px solid black;
        }

        .right-size, .left-size{
            width: 300px;
            margin-left: auto;
            margin-right: auto;
        }

        #price-sum{
            width: 70%;
            padding-left: 10px;
            padding-right: 10px;
            margin-top: 10px;
            margin-left: auto;
            margin-right: auto;
        }

        .tg{
            empty-cells: hide;
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
        }

        .tt, .tb{
            border: 1px solid black;
            border-collapse: collapse;
        }

        .tt{
            background-color: #e6e6e6;
            font-weight: 300;
            margin: 0;
            padding: 5px;
        }

        .tb, .ti, .ti-d{
            text-align: right;
            font-size: 16px;
            padding: 5px;
        }

        .ti{
            border-bottom: 1px solid black;
        }

        .ti-d{
            border: 1px solid black;
        }

        .empty{
            border: none;
        }

        #payment-info{
            width: 30%;
            padding-left: 20px;
            padding-right: 20px;
        }

        #director-info{
            width: 30%;
            margin-left: auto;
            margin-right: 0;
            text-align: center;
            padding-left: 20px;
            padding-right: 20px;
        }

        .thin-signature{
            background: black;
            height: 3px;
            margin-top: 35px;
            width: 200px;
        }

        .end-line{
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            height: 2px;
            padding-left: 10px;
            padding-right: 10px;
        }

        .left-aligned{
            text-align: left;
        }

        .right-aligned{
            text-align: right;
        }

        .top-padded{
            padding-top: 20px;
            padding-bottom: 5px;
        }

        .big-text{
            font-size: 18px;
        }

</style>    
<body>
    <div class="row"><img src="../images/logo.png" style="height: 60px; width:350px; margin-left: 10px; margin-top: 30px;"></div>
    <div class="column">
        <div class="row around">
            <div class="row bold">OD SMARTLAB</div>
            <div class="row lightbold">www.smartlab.ba</div>
        </div>
    </div>
    <div class="column">
        <div class="row around">
            <div class="row lightbold">Behdžeta Mutevelića 13 | 71000 Sarajevo</div>
            <div class="row lightbold">info@smartlab.ba</div>
        </div>
    </div>
    <div class="column">
        <div class="row around">
            <div class="row lightbold">ID: 4302792040005 | PDV: 302792040005 </div>
            <div class="row lightbold">tel: +387 33 956 222</div>
        </div>
    </div>

    <hr class="fat-line">

    <div id="info-main">

        <div class="row">
            <div class="row separated">
                <div class="line-separator"></div>
                <p class="info-item">Predračun<p>
                <div class="line-separator"></div>
            </div>
            <div class="row separated">
                <div class="line-separator"></div>
                <p class="info-item">Kupac</p>
                <div class="line-separator"></div>
            </div>
        </div>

        <div id="topContent">

            <div class="padded-left">
                <div class="row left-size">
                    <div class="row"><p class="colored-text">Broj računa</p></div>
                    <div class="row"><p class="uncolored-text">{{$customerData->bill_number}}</p></div> 
                </div>
                <div class="row left-size">
                    <div class="row"><p class="colored-text">BF</p></div> 
                    <div class="row"><p class="uncolored-text">-</p></div>               
                </div>
                <div class="row left-size">
                    <div class="row"><p class="colored-text">Datum Izdavanja</p></div>         
                    <div class="row"><p class="uncolored-text"></p></div> 
                </div>
                <div class="row left-size">
                    <div class="row"><p class="colored-text">Rok za plaćanje</p></div>
                    <div class="row"><p class="uncolored-text">5 dana</p></div>        
                </div>
                <div class="row left-size">
                    <div class="row"><p class="colored-text">Mjesto izdavanja</p></div>            
                    <div class="row"><p class="uncolored-text">{{$customerData->city}}</p></div>        
                </div>
            </div>
            
            <div class="padded-right">
                @if($customerData->status == 'fizicko')
                    <div class="row right-size">
                        <div class="row"><p class="uncolored-text-full">
                            {{$customerData->name}} {{$customerData->surname}}
                        </p></div> 
                    </div>
                @else
                    <div class="row right-size">
                        <div class="row"><p class="uncolored-text-full">Adresa firme: {{$companyData->company_adress}}</p></div>               
                    </div>
                    <div class="row right-size">
                        <div class="row"><p class="uncolored-text-full">ID: {{$companyData->company_id}}</p></div> 
                    </div>
                    <div class="row right-size">
                        <div class="row"><p class="uncolored-text-full">PDV: 4200736080005</p></div>        
                    </div>
                @endif
                
            </div>

        </div>

        <hr class="fat-line">

        <div id="price-sum">

            <table class="tg">
                <tr>
                    <th class="tt">R.b.</th>
                    <th class="tt">Opis usluge/artikla</th>
                    <th class="tt">Mj. jed.</th>
                    <th class="tt">Kol.</th>
                    <th class="tt">Cijena</th>
                </tr>
                
                @foreach($coursesInfo as $indexKey => $singleCourse)
                    <tr>
                        <td class="tb right-aligned top-padded">{{$indexKey + 1}}</td>
                        <td class="tb left-aligned top-padded">Trening "{{$singleCourse['course_name']}}" uciexcel.ba</td>
                        <td class="tb right-aligned top-padded">Polazn.</td>
                        <td class="tb right-aligned top-padded">{{$singleCourse['course_participants']}}</td>
                        <td class="tb right-aligned top-padded">{{$singleCourse['course_price']}}</td>
                    </tr>
                    
                @endforeach
                <tr>
                    <td class="empty"></td>
                    <td class="empty"></td>
                    <td class="empty"></td>
                    <td class="ti">Osnovica za PDV (KM)</td>
                    <td class="ti-d bold">{{$priceWithoutDiscount}}</td>
                </tr>
                <tr>
                    <td class="empty"></td>
                    <td class="empty"></td>
                    <td class="empty"></td>
                    <td class="ti">Iznos PDV-a</td>
                    <td class="ti-d bold">17%</td>
                </tr>
                <tr>
                    <td class="empty"></td>
                    <td class="empty"></td>
                    <td class="empty"></td>
                    <td class="ti">Popust</td>
                    <td class="ti-d bold">{{$customerData->discount}}%</td>
                </tr>
                <tr>
                    <td class="empty"></td>
                    <td class="empty"></td>
                    <td class="empty"></td>
                    <td class="ti">Cijena sa popustom</td>
                    <td class="ti-d bold">{{$customerData->fee}}</td>
                </tr>
                <tr>
                    <td class="empty"></td>
                    <td class="empty"></td>
                    <td class="empty"></td>
                    <td class="ti">Zaokruzenje (KM)</td>
                    <td class="ti-d bold">/</td>
                </tr>
                <tr>
                    <td class="empty"></td>
                    <td class="empty"></td>
                    <td class="empty"></td>
                    <td class="ti">Ukupno za platiti (KM)</td>
                    <td class="ti-d bold">{{$customerData->fee + (17 / 100) * $customerData->fee}}</td>
                </tr>
            </table>

        </div>

        <div id="payment-info">
            Plaćanje
            <hr class="thin">
            <div class="column big-text">Sberbank BH d.d.</div>
            <div class="column big-text">Žiro račun u BiH: 1401041120004178</div>
            <div class="column big-text">Devizni IBAN: BA39-1401041200470237</div>
            <div class="column big-text">SWIFT: SABRBA22</div>
        </div>

        <div id="director-info">
            Direktor

            <hr class="thin-signature">
            <div class="column">Rizah Kabaši</div>
        </div>

        <div class="row">www.smartlab.ba | www.uciexcel.ba | www.uciengleski.ba</div>
        <hr class="end-line">
        Laboratorij znanja

    </div>

    <form action="/pdf/save" enctype="multipart/form-data" method="post">
        @csrf
        @method('POST')

        <button type="submit" class="btn">save pdf</button>
    </form>
  
</body>
</body>