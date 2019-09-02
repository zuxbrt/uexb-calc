<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Customer;
use App\CustomerCompanyInfo;
use App\Coupon;

class MainController extends Controller
{

    public function index()
    {
        $courses = Course::all();
        $coupons = Coupon::all();
        //$courses = [];
        //$coupons = [];
        return view('index', compact('courses', 'coupons'));
    }

    /**
    * Calculate customer's price of courses.
    */
    public function store()
    {
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
            $companyAttributes =request()->validate(
                [   
                    'company_id' => 'required|numberic',
                    'company_address' => 'required',
                    'assignee' => 'required'
                ]
            );

            $attributes['status'] = 'pravno';

            //$customerCompanyInfo = CustomerCompanyInfo::create($companyAttributes);
        }

        // validate code if exists
        if(request('code') !== null){
            $coupon = Coupon::where('code', request('code'))->get();
            $couponName = $coupon->pluck('name')[0];
            $couponDiscount =$coupon->pluck('discount')[0];

            $attributes['coupon'] = $couponName;
        } else {
            $coupon = null;
        }
        
        // init values
        $selectedCourses = [];
        $totalParticipants = 0;
        $totalPrice = 0;

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
            $totalPrice += $coursePrice[0];
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
        if($coupon !== null){
            $discount = $discount + $couponDiscount;
        }

        // calculate final price
        if($discount !== 0){
            $discountValue = ($discount / 100) * $totalPrice;
            $priceWithDiscount = $totalPrice - $discount;
        } else {
            $priceWithDiscount = $totalPrice;
        }

        // set total price
        $attributes['fee'] = $priceWithDiscount;
        dd($attributes);

        // todo insert custopmer courses by ids

        // $customer = Customer::create($attributes);

        //Customer::create($attributes)->save();

        return redirect('/');

    }

}
