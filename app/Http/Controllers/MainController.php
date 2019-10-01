<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Customer;
use App\CustomersCompanyInfo;
use App\CustomersCourses;
use App\Coupon;

class MainController extends Controller
{

    public function index()
    {
        $courses = Course::all();
        $coupons = Coupon::all();
        return view('index', compact('courses', 'coupons'));
    }

    /**
    * Calculate customer's price of courses.
    */
    public function store()
    {
        // captcha validation
        $captchaValidate = request()->validate(
            [
                'g-recaptcha-response' => 'required|captcha'
            ]
        );
         
        // extracting all attributes
        $allAttributes = request()->all();


        // validating main attributes
        $attributes = request()->validate(
            [
                'name' => 'required|min:3',
                'surname' => 'required|min:3',
                'email' => 'required',
                'phone' => 'required|numeric',
                'city' => 'required|min:3',
            ]
        );

        // check person status
        if(request('person') === 'f'){
            $attributes['status'] = 'fizicko';
        } else {
            $attributes['status'] = 'pravno';
        }

        // validate coupon code if exists
        if(request('code') !== null){
            $coupon = Coupon::where('code', request('code'))->get();

            // validate coupon
            if(isset($coupon[0])){
                $couponName = $coupon->pluck('name')[0];
                $couponDiscount =$coupon->pluck('discount')[0];
                $attributes['coupon'] = $couponName;
            } else {
                $attributes['coupon'] = '';
            }

        } else {
            $coupon = null;
        }
        
        // init values
        $selectedCourses = [];
        $totalParticipants = 0;
        $totalPrice = 0;
        $coursesPrices = [];

        // extract course ids and course participants
        foreach($allAttributes as $key => $value){
            if(preg_match('/polaznicikurs-/',$key)){
                $selectedCourses[substr($key, 14)] = $value;
                $totalParticipants += $value;
            }
        }

        // get courses price
        foreach($selectedCourses as $courseId => $courseParticipants){
            $courseData = Course::where('id', $courseId)->get();
            $coursePrice = $courseData->pluck('price');
            $coursesPrices[$courseId] = intval($coursePrice[0]) * intval($courseParticipants);
        }

        // calculate total price
        foreach($coursesPrices as $aCourse => $aPrice){
            $totalPrice += $aPrice;
        }

        // init values
        $discount = 0;
        $priceWithDiscount = 0;

        // set discount percentage
        if($totalParticipants > 1 && $totalParticipants <= 2){
            $discount = 5;
        } elseif($totalParticipants >= 3 && $totalParticipants <= 5){
            $discount = 10;
        } elseif($totalParticipants >= 6 && $totalParticipants <= 10){
            $discount = 15;
        } elseif($totalParticipants >= 11 && $totalParticipants <= 15){
            $discount = 20;
        } elseif($totalParticipants >= 15 && $totalParticipants <= 20){
            $discount = 25;
        } elseif($totalParticipants >= 21){
            $discount = 30;
        } else {
            $discount = 0;
        }

        // if coupon discount exists
        if(isset($coupon[0])){
            $discount = $discount + $couponDiscount;
        }

        // calculate final price
        if($discount !== 0){
            $discountValue = ($discount / 100) * $totalPrice;
            $priceWithDiscount = $totalPrice - $discountValue;
        } else {
            $priceWithDiscount = $totalPrice;
        }

        // set total price
        $attributes['fee'] = $priceWithDiscount;
        $attributes['discount'] = $discount;
        $attributes['base_price'] = $totalPrice;

        // form bill number
        $attributes['bill_number'] = $this->createBillNumber();

        // create customer, company info and return its id
        $customerId = Customer::insertGetId($attributes);

        if($attributes['status'] === 'pravno'){
            $companyAttributes =request()->validate(
                [   
                    'company_id' => 'required|numeric',
                    'company_address' => 'required',
                    'company_name' => 'required'
                ]
            );

            $companyAttributes['customer_id'] = $customerId;

            $customerCompanyInfo = CustomersCompanyInfo::create($companyAttributes);
        }

        // store customer selected courses
        foreach($selectedCourses as $singleCourseId => $singleCourseParticipants){

            $customerCourses = CustomersCourses::create([
                'customer_id' => $customerId,
                'course_id' => $singleCourseId,
                'course_participants' => $singleCourseParticipants
            ]);
        }

        //Customer::create($attributes)->save();

        return redirect('/pdf');

    }

    /**
    //  * Create bill number
     */
    public function createBillNumber()
    {
        $date = new \DateTime();
        $date = date_format($date, 'd/m/Y');
        $day = substr($date, 0, 2);
        $month = substr($date, 3, 2);
        $year = substr($date, 8, 11);
        return 'UCI-'.$day.'/'.$month.'/'.$year;
    }

}
