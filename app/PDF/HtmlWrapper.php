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

        if(empty($files)){
            return false;
        } else {
            foreach($files as $singleFile){
                // extract file name
                $fileName = substr($singleFile, 12);
                //dd($fileName, 'predracun-'.$customerId.'-'.$currentDateTime.'.pdf');
                // if file exist, return true
                if($fileName === 'predracun-'.$customerId.'-'.$currentDateTime.'.pdf'){
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
    public function createPDFFromHtml($customerData,$companyInfo,$coursesInfo,$priceWithoutDiscount,$priceWithDiscount,$currentDateTime,$customerDataId){


        $customerInfoContent = '';
        if($customerData->status === 'fizicko'){
            $customerInfoContent = '
            <div class="column" style="display:flex;flex-direction:column;flex-wrap:nowrap;">
            <p class="uncolored-text-full" style="margin:0;padding:0;line-height:1;border-bottom:1px solid black;font-size:18px;width:200px;margin-left:28px;">'.$customerData->name.' '.$customerData->surname.'</p>                             
            </div>
            <div class="row right-size" style="display:flex;flex-direction:row;flex-wrap:nowrap;width:300px;margin-left:auto;margin-right: auto;">
            <div class="row" style="display:flex;flex-direction:row;flex-wrap:nowrap;width:300px;margin-left:auto;margin-right:auto;"></div> 
            </div>';
        } else {
            $customerInfoContent = '
            <div style="padding-top: 40px;width: 100%;">
                <div style="display:flex;flex-direction:column;flex-wrap:nowrap;">
                <p class="uncolored-text" style="margin:0;padding:0;line-height:1;width:200px;font-size:14px;border-bottom: 1px solid black;margin-left:205px;">'.$companyInfo["company_address"].'</p>
                </div>
                <div style="display: flex;flex-direction:column;flex-wrap:nowrap;">
                <p class="uncolored-text" style="margin:0;padding:0;line-height:1;width:200px;font-size:14px;border-bottom: 1px solid black;margin-left:205px;margin-top:10px;">'.$companyInfo["company_id"].'</p>
                </div>   
                <div style="display: flex;flex-direction:column;flex-wrap:nowrap;">
                <p class="uncolored-text" style="margin:0;padding:0;line-height:1;width:200px;font-size:14px;border-bottom: 1px solid black;margin-left:205px;margin-top:10px;">PDV: 4200736080005</p>
                </div>
            </div>
            ';
        }
        
        $coursesHtml = '';
        $counter = 1;
        foreach($coursesInfo as $indexKey => $singleCourse){
            $coursesHtml .=
            '<tr>
                <td class="tb right-aligned top-padded" style="border:1px solid black;padding-top:20px;padding-bottom:5px;">'.$counter.'</td>
                <td class="tb left-aligned top-padded" style="border:1px solid black;padding-top:20px;padding-bottom:5px;">Trening '.$singleCourse['course_name'].' uciexcel.ba</td>
                <td class="tb right-aligned top-padded" style="border:1px solid black;padding-top:20px;padding-bottom:5px;">Polazn.</td>
                <td class="tb right-aligned top-padded" style="border:1px solid black;padding-top:20px;padding-bottom:5px;">'.$singleCourse['course_participants'].'</td>
                <td class="tb right-aligned top-padded" style="border:1px solid black;padding-top:20px;padding-bottom:5px;">'.$singleCourse['course_price'].'</td>
            </tr>';
            $counter++;
        }

        $totalPriceOfCourses = $customerData->fee + (17 / 100) * $customerData->fee;

        //dd($customerInfoContent);
        $pdf = App::make('dompdf.wrapper');

        $pdf->loadHTML('
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Predracun</title>
    <style></style>
    </head>
    <body style="font-family: DejaVu Sans;">
        <div style="display: flex;flex-direction: row;flex-wrap: nowrap;"><img src="../public/images/logo.png" style="height: 60px; width:350px; margin-left: 10px; margin-top: 30px;"></div>
        <div style="display: flex;flex-direction: row;flex-wrap: nowrap;">
            <div class="left bold-text" style="margin-left: 0;margin-right: auto;text-align: left;padding-left: 10px;padding-right: 10px; width: 150px;font-weight: 700;">
                OD SMARTLAB
            </div>
            <div style="margin-left:auto;margin-right:0;text-align:right;padding-left:10px;padding-right:10px;width:100px;">
                www.smartlab.ba
            </div>
        </div>
        <div style="display: flex;flex-direction: row;flex-wrap: nowrap;">
            <div class="left-wide-xl" style="margin-left: 0;margin-right: auto;text-align: left;padding-left: 10px;padding-right: 10px;width: 450px;">
                Behdžeta Mutevelića 13 | 71000 Sarajevo
            </div>
            <div class="right" style="margin-left: auto;margin-right: 0;text-align: right;padding-left: 10px;padding-right: 10px;width: 100px;">
                info@smartlab.ba
            </div>
        </div>
        <div class="row" style="display: flex;flex-direction: row;flex-wrap: nowrap;">
            <div class="left-wide-xl" style="margin-left: 0;margin-right: auto;text-align: left;padding-left: 10px;padding-right: 10px;width: 450px;">
                BID: 4302792040005 | PDV: 302792040005
            </div>
            <div class="right-wide" style="margin-left: auto;margin-right: 0;text-align: right;padding-left: 10px;padding-right: 10px;width: 250px;">
                tel: +387 33 956 222
            </div>
        </div>
    
        <hr class="fat-line" style="height: 4px;background: black;margin-bottom: 20px;">
    
        <div id="info-main" style="margin-top: 50px;width: 100%;">
    
                <div class="row" style="display: flex;flex-direction: row;flex-wrap: nowrap; ">
                    <div style="border-bottom: 2px solid black; width: 150px; margin-left: 20px; text-align: center;">
                        <p class="info-item" style="margin: 0;padding: 0;line-height: 1;font-weight: bolder;font-size: 21px;margin-left: 20px;margin-right: 20px;">Predračun</p>
                    </div>
                </div>
    
                        <div class="column" style="display: flex;flex-direction: column;flex-wrap: none;">
                            <p class="colored-text" style="margin: 0;padding: 0;line-height: 1;width: 200px;font-size: 14px;color: #73ae56;text-align: right;padding-right: 5px;width: 200px;">Broj računa:</p>         
                            <p class="uncolored-text" style="margin: 0;padding: 0;line-height: 1;width: 200px;font-size: 14px;border-bottom: 1px solid black;margin-left: 205px;">'.$customerData->bill_number.'</p>
                        </div>
                        
                        <div class="column" style="display: flex;flex-direction: column;flex-wrap: none;">
                            <p class="colored-text" style="margin: 0;padding: 0;line-height: 1;width: 200px;font-size: 14px;color: #73ae56;text-align: right;padding-right: 5px;width: 200px;">BF:</p>                             
                            <p class="uncolored-text" style="margin: 0;padding: 0;line-height: 1;width: 200px;font-size: 14px;border-bottom: 1px solid black;margin-left: 205px;">/</p>
                        </div>
    
                        <div class="column" style="display: flex;flex-direction: column;flex-wrap: none;">
                            <p class="colored-text" style="margin: 0;padding: 0;line-height: 1;width: 200px;font-size: 14px;color: #73ae56;text-align: right;padding-right: 5px;width: 200px;">Datum Izdavanja:</p>                             
                            <p class="uncolored-text" style="margin: 0;padding: 0;line-height: 1;width: 200px;font-size: 14px;border-bottom: 1px solid black;margin-left: 205px;">'.$customerData->date_created.'</p>
                        </div>
    
                        <div class="column" style="display: flex;flex-direction: column;flex-wrap: none;">
                            <p class="colored-text" style="margin: 0;padding: 0;line-height: 1;width: 200px;font-size: 14px;color: #73ae56;text-align: right;padding-right: 5px;width: 200px;">Rok za plaćanje</p>                             
                            <p class="uncolored-text" style="margin: 0;padding: 0;line-height: 1;width: 200px;font-size: 14px;border-bottom: 1px solid black;margin-left: 205px;">5 dana</p>
                        </div>
    
                        <div class="column" style="display: flex;flex-direction: column;flex-wrap: none;">
                            <p class="colored-text" style="margin: 0;padding: 0;line-height: 1;width: 200px;font-size: 14px;color: #73ae56;text-align: right;padding-right: 5px;width: 200px;">Mjesto izdavanja</p>                             
                            <p class="uncolored-text" style="margin: 0;padding: 0;line-height: 1;width: 200px;font-size: 14px;border-bottom: 1px solid black;margin-left: 205px;">'.$customerData->city.'</p>
                        </div>
                    </div>
                
                    
    
            <div style="border-bottom: 2px solid black; width: 150px; margin-left: 20px; text-align: center; margin-top: 130px;">
                <p class="info-item" style="margin: 0;padding: 0;line-height: 1;font-weight: bolder;font-size: 21px;margin-left: 20px;margin-right: 20px;">Kupac</p>
            </div>
                
    
    
            <div id="topContent" style="display:flex;flex-direction:column;flex-wrap:nowrap;">
    
            '.$customerInfoContent.'
                
            </div>
    
            <div class="page-break" style="page-break-after: always;"></div>
            <hr class="fat-line" style="height: 4px;background: black;margin-top: 20px;margin-bottom: 20px;">
    
            <div id="price-sum" style="width: 70%;padding-left: 10px;padding-right: 10px;margin-top: 10px;margin-left: auto;margin-right: auto;">
    
                <table class="tg" style="empty-cells: hide;border-collapse: collapse;margin-left: auto;margin-right: auto;">
                    <tbody>
                        <tr>
                            <th class="tt" style="border:1px solid black;border-collapse:collapse;background-color:#e6e6e6;font-weight:300;margin:0;padding:5px;">R.b.</th>
                            <th class="tt" style="border:1px solid black;border-collapse:collapse;background-color:#e6e6e6;font-weight:300;margin:0;padding:5px;">Opis usluge/artikla</th>
                            <th class="tt" style="border:1px solid black;border-collapse:collapse;background-color:#e6e6e6;font-weight:300;margin:0;padding:5px;">Mj. jed.</th>
                            <th class="tt" style="border:1px solid black;border-collapse:collapse;background-color:#e6e6e6;font-weight:300;margin:0;padding:5px;">Kol.</th>
                            <th class="tt" style="border:1px solid black;border-collapse:collapse;background-color:#e6e6e6;font-weight:300;margin:0;padding:5px;">Cijena</th>
                            </tr>
                        '.$coursesHtml.'
                        
                        
                        <tr>
                            <td class="empty" style="border-top: 1px solid black;">&nbsp;</td>
                            <td class="empty" style="border-top: 1px solid black;">&nbsp;</td>
                            <td class="empty" style="border-top: 1px solid black;">&nbsp;</td>
                            <td class="ti" style="border-bottom: 1px solid black;text-align: right;font-size: 12px;padding: 5px;">Osnovica za PDV (KM)</td>
                            <td class="ti-d bold" style="text-align: right;font-size: 12px;padding: 5px;border: 1px solid black;font-weight:700;">'.$priceWithoutDiscount.'</td>
                        </tr>
                        <tr>
                            <td class="empty" style="border: none;"></td>
                            <td class="empty" style="border: none;"></td>
                            <td class="empty" style="border: none;"></td>
                            <td class="ti" style="border-bottom: 1px solid black;text-align: right;font-size: 12px;padding: 5px;">Iznos PDV-a</td>
                            <td class="ti-d bold" style="text-align: right;font-size: 12px;padding: 5px;border: 1px solid black;font-weight:700;">17%</td>
                        </tr>
                        <tr>
                            <td class="empty" style="border: none;"></td>
                            <td class="empty" style="border: none;"></td>
                            <td class="empty" style="border: none;"></td>
                            <td class="ti" style="border-bottom: 1px solid black;text-align: right;font-size: 12px;padding: 5px;">Popust</td>
                            <td class="ti-d bold" style="text-align: right;font-size: 12px;padding: 5px;border: 1px solid black;font-weight:700;">'.$customerData->discount.'%</td>
                        </tr>
                        <tr>
                            <td class="empty" style="border: none;"></td>
                            <td class="empty" style="border: none;"></td>
                            <td class="empty" style="border: none;"></td>
                            <td class="ti" style="border-bottom: 1px solid black;text-align: right;font-size: 12px;padding: 5px;">Cijena sa popustom</td>
                            <td class="ti-d bold" style="text-align: right;font-size: 12px;padding: 5px;border: 1px solid black;font-weight:700;">'.$priceWithDiscount.'</td>
                        </tr>
                        <tr>
                            <td class="empty" style="border: none;"></td>
                            <td class="empty" style="border: none;"></td>
                            <td class="empty" style="border: none;"></td>
                            <td class="ti" style="border-bottom: 1px solid black;text-align: right;font-size: 12px;padding: 5px;">Zaokruzenje (KM)</td>
                            <td class="ti-d bold" style="text-align: right;font-size: 12px;padding: 5px;border: 1px solid black;font-weight:700;">/</td>
                        </tr>
                        <tr>
                            <td class="empty" style="border: none;"></td>
                            <td class="empty" style="border: none;"></td>
                            <td class="empty" style="border: none;"></td>
                            <td class="ti" style="border-bottom: 1px solid black;text-align: right;font-size: 12px;padding: 5px;">Ukupno za platiti (KM)</td>
                            <td class="ti-d bold" style="text-align: right;font-size: 12px;padding: 5px;border: 1px solid black;font-weight:700;">'.$totalPriceOfCourses.'</td>
                        </tr>
                </tbody>
            </table>
    
            </div>
    
            <div id="payment-info" style="width: 30%;padding-left: 20px;padding-right: 20px;">
    
                <div class="left" style="margin-left: 0;margin-right: auto;text-align: left;padding-left: 10px;padding-right: 10px;width: 150px;">
                    Plaćanje
                </div>
                
                <hr class="thin">
    
                <div class="left" style="margin-left: 0;margin-right: auto;text-align: left;padding-left: 10px;padding-right: 10px;width: 150px;">
                    Sberbank BH d.d.
                </div>
                <div class="left" style="margin-left: 0;margin-right: auto;text-align: left;padding-left: 10px;padding-right: 10px;width: 200px;">
                    Žiro račun u BiH: 1401041120004178
                </div>
                <div class="left" style="margin-left: 0;margin-right: auto;text-align: left;padding-left: 10px;padding-right: 10px;width: 200px;">
                    Devizni IBAN: BA39-1401041200470237
                </div>
                <div class="left" style="margin-left: 0;margin-right: auto;text-align: left;padding-left: 10px;padding-right: 10px;width: 200px;">
                    SWIFT: SABRBA22
                </div>
            </div>
    
            <div style="margin-top: 90px;"></div>
    
            <div id="director-info" style="width: 30%;margin-left: auto;margin-right: 0;text-align: center;padding-left: 20px;padding-right: 20px;">
                Direktor
                <div class="column" style="display: flex;flex-direction: column;flex-wrap: none;padding-top: 50px;"></div>
                <hr class="thin-signature" style="background: black;height: 3px;margin-top: 35px;width: 200px;">
                <div class="column" style="display: flex;flex-direction: column;flex-wrap:no-wrap;">Rizah Kabaši</div>
            </div>
    
            <div class="row" style="display: flex;flex-direction: orw;flex-wrap:no-wrap;">www.smartlab.ba | www.uciexcel.ba | www.uciengleski.ba</div>
            <hr class="end-line">
            Laboratorij znanja
    
    <script></script>
    </body>
        ');

        // update taxed price of courses
        $customer = Customer::find($customerDataId);
        $customer->taxed_fee = $totalPriceOfCourses;
        $customer->save();

        $output = $pdf->output();
        Storage::put('public/pdfs/predracun-'.$customerDataId.'-'.$currentDateTime.'.pdf',$output);
        return $currentDateTime;
    }
}

?>