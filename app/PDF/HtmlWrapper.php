<?php

namespace App\PDF;

use PDF;
use App;
use App\Customer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class HtmlWrapper
{
    /**
    //  * Generate PDF file from given data.
     */
    public function generatePDF($customerData, $companyInfo, $coursesInfo, $priceWithoutDiscount, $priceWithDiscount)
    {
        $currentDateTime = date("Y-m-d_h-i");

        $check = $this->checkIfExists($customerData['id'], $currentDateTime);

        return $this->createPDFFromHtml(
            $customerData,
            $companyInfo,
            $coursesInfo,
            $priceWithoutDiscount,
            $priceWithDiscount,
            $currentDateTime,
            $customerData['id']
        );

        // if pdf exists
        // if($check === true){
        //     return false;
        // } else {
        //     return $this->createPDFFromHtml(
        //         $customerData,
        //         $companyInfo,
        //         $coursesInfo,
        //         $priceWithoutDiscount,
        //         $currentDateTime, 
        //         $customerData['id']
        //     );
        // }

    }

    /**
    //  * Check if pdf already exists. *DISABLED*
     */
    public function checkIfExists($customerId, $currentDateTime)
    {
        $files = Storage::files('/public/pdfs');

        if (empty($files)) {
            return false;
        } else {
            foreach ($files as $singleFile) {
                // extract file name
                $fileName = substr($singleFile, 12);
                //dd($fileName, 'predracun-'.$customerId.'-'.$currentDateTime.'.pdf');
                // if file exist, return true
                if ($fileName === 'predracun-' . $customerId . '-' . $currentDateTime . '.pdf') {
                    return true;
                } else {
                    continue;
                }
            }
        }
    }

    /**
    //  * Generate pdf with data and html
     */
    public function createPDFFromHtml($customerData, $companyInfo, $coursesInfo, $priceWithoutDiscount, $priceWithDiscount, $currentDateTime, $customerDataId)
    {


        $customerInfoContent = '';
        if ($customerData->status === 'fizicko') {
            $customerInfoContent = '
            <div style="width: 100%; text-align: center;margin: 0 auto;">
            <p style="display:inline-block; width:100%;text-align: center; padding-left: 45px;"><span style="width:50%;border-bottom:1px solid black; margin:0 auto;display:inline-block;">' . $customerData->name . ' ' . $customerData->surname . '</span></p>
            </div>
            ';
        } else {
            $customerInfoContent = '
            <div style="margin-left: 25%; margin-right: 5%;">

                <p style="margin:0;padding:0 0 0 5px;border-bottom: 1px solid black;">' . $companyInfo["company_name"] . '</p>
                
                <p style="margin:0;padding:0 0 0 5px;border-bottom: 1px solid black;">' . $companyInfo["company_address"] . '</p>
                
                <p style="margin:0;padding:0 0 0 5px;border-bottom: 1px solid black;">' . $companyInfo["company_id"] . '</p>
               
                <p style="margin:0;padding:0 0 0 5px;border-bottom: 1px solid black;">PDV: 4200736080005</p>
                
            </div>
            ';
        }

        $coursesHtml = '';
        $counter = 1;
        foreach ($coursesInfo as $indexKey => $singleCourse) {
            $coursesHtml .=
                '<tr>
                <td class="tb right-aligned " style="border:1px solid black;text-align: center;">' . $counter . '</td>
                <td class="tb left-aligned " style="border:1px solid black;">' . $singleCourse['course_name'] . '</td>
                <td class="tb right-aligned " style="border:1px solid black;">Polazn.</td>
                <td class="tb right-aligned " style="border:1px solid black;">' . $singleCourse['course_participants'] . '</td>
                <td class="tb right-aligned " style="border:1px solid black;">' . $singleCourse['course_price'] . '</td>
            </tr>';
            $counter++;
        }

        $totalPriceOfCourses = $customerData->fee + (17 / 100) * $customerData->fee;
        $content =
            //dd($customerInfoContent);
            $pdf = App::make('dompdf.wrapper');

        $pdf->loadHTML('
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
    <style type="text/css" media="all">
        .horizontal-line{
            border-bottom: 5px solid black;
            height: 10px;
            margin-top: 10px;
            clear: both;
        }
        #head{
            margin-right: 20px;
            margin-left: 20px;
        }
        .logo img{
            width: 350px;
            height:60px;
        }
        .company-info-left{
            display: inline-block;
            float: left;
            width: 40%;
        }
        .company-info-right{
            display: inline-block;
            float: right;
            width: 59%;
            text-align: right;
        }
        .company-info p{
            margin: 0;
        }
        .bold-text{
            font-weight: bold;
        }
        a{
            text-decoration: none;
            color: black;
        }
        #info{
           margin-top: 20px;
           margin-bottom: 20px;
           height: 140px;
        }
        .company-info{
            height: 65px;
        }
        ul{
            list-style-type: none;
            padding-left: 0;
        }
        .predracun{
            display: inline-block;
            width: 47%;
            float: left;
            margin-left: 10px;
            height: 100px;
        }
        .kupac{
            display: inline-block;
            width: 47%;
            float: right;
            margin-right: 10px;
            height: 100px;
        }
        .predracun-left{
            color: #72ae56;
            display: inline-block;
            text-align: right;
            width: 120px;
            font-size: 12px;
            padding-right: 3px;
        }
        .predracun-right{
            color: black;
            display: inline-block;
            font-size: 12px;
            padding-left: 2px;
        }
        .predracun-title{
            font-weight: bold;
            position: relative;
            display: block;
            width: 75px;
            margin-left: 60px;
        }
        .kupac-title{
            font-weight: bold;
            position: relative;
            display: block;
            width: 75px;
            margin-left: 120px;
        }
        .predracun-title::before,  .kupac-title::before{
            content: " ";
            display: inline-block;
            position: absolute;
            left: -50px;
            top: 8px;
            height: 3px;
            width: 40px;
            background-color: black;
        }
        .predracun-title::after{
            width: 140px;
        }
        .kupac-title::after{
            width: 150px;
        }
        .predracun-title::after, .kupac-title::after{
            content: " ";
            display: inline-block;
            position: absolute;
            height: 3px;
            background-color: black;
            top: 8px;
            margin-left: 10px;
           
        }
        table{
            width: 100%;
            margin-top: 30px;
            margin-right: 10px !important;
            margin-left: 10px !important;
        }
        #placanje{
            width: 40%;
            margin-left: 10px;
            margin-top: 30px;
        }
        #placanje p{
            border-bottom: 3px solid black;
            margin:0;
            padding-bottom: 5px;
            margin-bottom: 5px;
        }
        #placanje ul{
            margin: 0;
        }
        #placanje li{
            margin-bottom: 3px;
        }
        #direktor{
            width: 50%;
            transform: translateX(110%);
            text-align: center;
        }
        #direktor p{
            margin: 0 auto;
        }
        .direktor{
            border-bottom: 2px solid black;
            width: 130px;
            padding-bottom: 30px;
        }
        #footer{
            margin-top: 50px;
            position: fixed;
            bottom: 10px;
            right: 10px;
        }
        #footer a{
            margin-left: 10px;
            padding-right: 10px;
            
            border-right: 1px solid black;
        }
        #footer p{
            margin: 0;
            margin-left: 10px;
        }
        .double-horizontal-line{
            width: 100%;
            height: 1px;
            border-top: 3px solid black;
            border-bottom: 1px solid black;
        }
        tr{
            height: 20px !important;
        }
    </style>
</head>
<body style="margin: 0 auto; font-family: DejaVu Sans; font-size: 12px;">
    <div id="head">
        <div class="logo">
            <img src="../public/images/logo.png">
        </div>
        <div class="company-info">
            <div class="company-info-left">
                <p class="bold-text">OD SMARTLAB</p>
                <p>Behdžeta Mutevelića 13 | 71000 Sarajevo</p>
                <p>ID: 4302792040005 |PDV: 302792040005</p>
            </div>
            <div class="company-info-right">
                <p>www.smartlab.ba</p>
                <p>info@smartlab.ba</p>
                <p>tel: +387 33 956 212</p>
            </div>
        </div>
    </div>
    <div class="horizontal-line"></div>
    <div id="info">
        <div class="predracun">
            <p class="predracun-title">Predračun</p>
            <ul>
                <li><span class="predracun-left">Broj računa: </span> <span class="predracun-right">' . $customerData->bill_number . '</span></li>
                <li><span class="predracun-left">BF </span><span class="predracun-right"> - </span></li>
                <li><span class="predracun-left">Datum izdavanja: </span><span class="predracun-right"> ' . $customerData->date_created . '</span></li>
                <li><span class="predracun-left">Rok za plaćanje: </span><span class="predracun-right"> 5 dana </span></li>
                <li><span class="predracun-left">Mjesto izdavanja: </span><span class="predracun-right"> ' . $customerData->city . ' </span></li>
            </ul> 
        </div>
        <div class="kupac">
            <p class="kupac-title">Kupac</p>
            ' . $customerInfoContent . '
        </div>
    </div>
    <div class="horizontal-line"></div>
    <div id="table">
        <table class="tg" style="empty-cells: hide;border-collapse: collapse;margin-left: auto;margin-right: auto;">
            <tbody>
                <tr>
                    <th class="tt" style="border:1px solid black;border-collapse:collapse;background-color:#e6e6e6;font-weight:300;margin:0;padding:5px;text-align:center;">R.b.</th>
                    <th class="tt" style="border:1px solid black;border-collapse:collapse;background-color:#e6e6e6;font-weight:300;margin:0;padding:5px;">Opis usluge/artikla</th>
                    <th class="tt" style="border:1px solid black;border-collapse:collapse;background-color:#e6e6e6;font-weight:300;margin:0;padding:5px;">Mj. jed.</th>
                    <th class="tt" style="border:1px solid black;border-collapse:collapse;background-color:#e6e6e6;font-weight:300;margin:0;padding:5px;">Kol.</th>
                    <th class="tt" style="border:1px solid black;border-collapse:collapse;background-color:#e6e6e6;font-weight:300;margin:0;padding:5px;">Cijena</th>
                    </tr>
                ' . $coursesHtml . '
                
                
                <tr>
                    <td class="empty" style="border-top: 1px solid black;">&nbsp;</td>
                    <td class="empty" style="border-top: 1px solid black;">&nbsp;</td>
                    
                    <td colspan="2" class="ti" style="border-bottom: 1px solid black;text-align: right;font-size: 12px;">Osnovica za PDV (KM)</td>
                    <td class="ti-d bold" style="text-align: right;font-size: 12px;padding: 5px;border: 1px solid black;font-weight:700;">' . $priceWithoutDiscount . '</td>
                </tr>
                <tr>
                    <td class="empty" style="border: none;"></td>
                    <td class="empty" style="border: none;"></td>
                    
                    <td colspan="2" class="ti" style="border-bottom: 1px solid black;text-align: right;font-size: 12px;">Iznos PDV-a</td>
                    <td class="ti-d bold" style="text-align: right;font-size: 12px;padding: 5px;border: 1px solid black;font-weight:700;">17%</td>
                </tr>
                <tr>
                    <td class="empty" style="border: none;"></td>
                    <td class="empty" style="border: none;"></td>
                    
                    <td colspan="2" class="ti" style="border-bottom: 1px solid black;text-align: right;font-size: 12px;">Popust</td>
                    <td class="ti-d bold" style="text-align: right;font-size: 12px;padding: 5px;border: 1px solid black;font-weight:700;">' . $customerData->discount . '%</td>
                </tr>
                <tr>
                    <td class="empty" style="border: none;"></td>
                    <td class="empty" style="border: none;"></td>
                    
                    <td colspan="2" class="ti" style="border-bottom: 1px solid black;text-align: right;font-size: 12px;">Cijena sa popustom</td>
                    <td class="ti-d bold" style="text-align: right;font-size: 12px;padding: 5px;border: 1px solid black;font-weight:700;">' . $priceWithDiscount . '</td>
                </tr>
                <tr>
                    <td class="empty" style="border: none;"></td>
                    <td class="empty" style="border: none;"></td>
                    
                    <td colspan="2" class="ti" style="border-bottom: 1px solid black;text-align: right;font-size: 12px;">Zaokruzenje (KM)</td>
                    <td class="ti-d bold" style="text-align: right;font-size: 12px;padding: 5px;border: 1px solid black;font-weight:700;">/</td>
                </tr>
                <tr>
                    <td class="empty" style="border: none;"></td>
                    <td class="empty" style="border: none;"></td>
                    
                    <td colspan="2" class="ti" style="border-bottom: 1px solid black;text-align: right;font-size: 12px;">Ukupno za platiti (KM)</td>
                    <td class="ti-d bold" style="text-align: right;font-size: 12px;padding: 5px;border: 1px solid black;font-weight:700;">' . $totalPriceOfCourses . '</td>
                </tr>
        </tbody>
    </table>
    </div>
    <div id="placanje">
        <p>Plaćanje</p>
        <ul>
            <li>Sberbank BH d.d.</li>
            <li>Žiro račun u BiH: 1401041120004178</li>
            <li>Devizni IBAN: BA39-1401041200470237</li>
            <li>SWIFT: SABRBA22</li>
        </ul>
    </div>
    <div id="direktor">
        <p class="direktor">Direktor</p>
        <p>Rizah Kabaši</p>
    </div>
    <div id="footer">
        <a href="https://smartlab.ba/">www.smartlab.ba</a> <a href="https://uciexcel.ba/">www.uciexcel.ba</a> <a href="https://uciengleski.ba/">www.uciengleski.ba</a>
        <div class="double-horizontal-line"></div>
        <p>Laboratorij znanja</p>
    </div>
</body>
</html>
        ');

        // update taxed price of courses
        $customer = Customer::find($customerDataId);
        $customer->taxed_fee = $totalPriceOfCourses;
        $customer->save();

        $output = $pdf->output();
        file_put_contents('../public/pdfs/predracun-' . $customerDataId . '-' . $currentDateTime . '.pdf',$output);
        return $currentDateTime;
    }
}
