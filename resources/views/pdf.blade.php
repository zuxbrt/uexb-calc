<html id="allContent">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="csrf-token" content="{{ Session::token() }}"> 
</head>
<title>Predracun</title>


<style>
        body {
            font-family: DejaVu Sans;
        }

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
            justify-content: space-around;
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .bold{
            font-weight: 700;
            font-size: 14px;
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
            width: 200px;
            font-size: 14px;
        }

        .uncolored-text-full{
            margin: 0;
            padding: 0;
            line-height: 1;
            /* min-width: 100%; */
            border-bottom: 1px solid black;
            width: 150px;
            /* text-align: left; */
            font-size: 18px;
        }

        .colored-text{
            color: #73ae56;
            text-align: right;
            padding-right: 5px;
            width: 150px;
        }

        .uncolored-text{
            /* text-align: left; */
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
            font-size: 12px;
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

        .right, .right-wide{
            margin-left: auto;
            margin-right: 0;
            text-align: right;
            padding-left: 10px;
            padding-right: 10px;
            /* margin-top: 5px; */
        }

        .right{
            width: 100px;
        }

        .right-wide{
            width: 250px;
        }

        .left, .left-wide, .left-wide-xl{
            margin-left: 0;
            margin-right: auto;
            text-align: left;
            padding-left: 10px;
            padding-right: 10px;
            /* margin-top: 5px; */
        }

        .left{
            width: 150px;
        }

        .left-wide{
            width: 250px;
        }
        .left-wide-xl{
            width: 450px;
        }

        .bold-text{
            font-weight: 700;
        }

        .page-break {
            page-break-after: always;
        }

</style>    
<body onload="getHtmlContent()">
    <div class="row"><img src="../public/images/logo.png" style="height: 60px; width:350px; margin-left: 10px; margin-top: 30px;"></div>
    <div class="row">
        <div class="left bold-text">
            OD SMARTLAB
        </div>
        <div class="right">
            www.smartlab.ba
        </div>
    </div>
    <div class="row">
        <div class="left-wide-xl">
            Behdžeta Mutevelića 13 | 71000 Sarajevo
        </div>
        <div class="right">
            info@smartlab.ba
        </div>
    </div>
    <div class="row">
        <div class="left-wide-xl">
            BID: 4302792040005 | PDV: 302792040005
        </div>
        <div class="right-wide">
            tel: +387 33 956 222
        </div>
    </div>

    <hr class="fat-line">

    <div id="info-main">

            <div class="row">
                <div style="border-bottom: 2px solid black; width: 150px; margin-left: 20px; text-align: center;">
                    <p class="info-item">Predračun</div><p>
                </div>

                    <div class="column">
                        <p class="colored-text" style="width: 200px;">Broj računa:</p>         
                        <p class="uncolored-text" style="margin-left: 205px;">{{$customerData->bill_number}}</p>
                    </div>
                    
                    <div class="column">
                        <p class="colored-text" style="width: 200px;">BF:</p>                             
                        <p class="uncolored-text" style="margin-left: 205px;">/</p>
                    </div>

                    <div class="column">
                        <p class="colored-text" style="width: 200px;">Datum Izdavanja:</p>                             
                        <p class="uncolored-text" style="margin-left: 205px;">{{$customerData->date_created}}</p>
                    </div>

                    <div class="column">
                        <p class="colored-text" style="width: 200px;">Rok za plaćanje</p>                             
                        <p class="uncolored-text" style="margin-left: 205px;">5 dana</p>
                    </div>

                    <div class="column">
                        <p class="colored-text" style="width: 200px;">Mjesto izdavanja</p>                             
                        <p class="uncolored-text" style="margin-left: 205px;">{{$customerData->city}}</p>
                    </div>
                </div>
            </div>
                

            <div style="border-bottom: 2px solid black; width: 150px; margin-left: 20px; text-align: center; margin-top: 130px;">
                <p class="info-item">Kupac</div><p>
            </div>


        <div id="topContent">
            
            <div class="padded-right">
                @if($customerData->status === 'fizicko')
                <div class="column">
                    <p class="uncolored-text-full" style="width: 200px; margin-left: 28px;">{{$customerData->name}} {{$customerData->surname}}</p>                             
                </div>
                    <div class="row right-size">
                        <div class="row"></div> 
                    </div>
                @else
                    <div class="row right-size">
                        <div class="row"><p class="uncolored-text-full">Adresa firme: {{$companyInfo['company_address']}}</p></div>               
                    </div>
                    <div class="row right-size">
                        <div class="row"><p class="uncolored-text-full">ID: {{$companyInfo['company_id']}}</p></div> 
                    </div>
                    <div class="row right-size">
                        <div class="row"><p class="uncolored-text-full">PDV: 4200736080005</p></div>        
                    </div>
                @endif
                
            </div>

        </div>

        <div class="page-break"></div>
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
                    <td class="empty" style="border-top: 1px solid black;">&nbsp;</td>
                    <td class="empty" style="border-top: 1px solid black;">&nbsp;</td>
                    <td class="empty" style="border-top: 1px solid black;">&nbsp;</td>
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

            <div class="left">
                Plaćanje
            </div>
            
            <hr class="thin">

            <div class="left">
                Sberbank BH d.d.
            </div>
            <div class="left" style="width: 200px;">
                Žiro račun u BiH: 1401041120004178
            </div>
            <div class="left" style="width: 200px;">
                Devizni IBAN: BA39-1401041200470237
            </div>
            <div class="left" style="width: 200px;">
                SWIFT: SABRBA22
            </div>
        </div>

        <div style="margin-top: 110px;"></div>

        <div id="director-info">
            Direktor
            <div class="column" style="padding-top: 50px;"></div>
            <hr class="thin-signature">
            <div class="column">Rizah Kabaši</div>
        </div>

        <div class="row">www.smartlab.ba | www.uciexcel.ba | www.uciengleski.ba</div>
        <hr class="end-line">
        Laboratorij znanja

    </div>

    <form action="/pdf/save" enctype="multipart/form-data" method="post" name="submitData" style="margin: 0 !important;">
        @csrf
        @method('POST')

        <button type="submit" class="btn" style="visibility: hidden;"></button>
        <input type="hidden" value="" name="htmlcontent" id="htmlContentValue" target="_blank">
    </form>
  
</body>

<script>

    function getHtmlContent(){
        var x = document.getElementById('allContent').innerHTML;
        document.getElementById('htmlContentValue').value = x;
        document.forms["submitData"].submit();
    }
</script>

</html>