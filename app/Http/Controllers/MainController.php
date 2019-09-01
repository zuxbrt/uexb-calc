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
        return view('calculator', compact('courses', 'coupons'));
    }

    /**
    * Calculate customer's price of courses.
    */
    public function store()
    {
        // setting customer type
        if(request('person') === 'f'){
            $customerStatus = 'fizicko';
        } else {
            $customerStatus = 'pravno';
        }

        $attributes = request()->validate(
            [
                'name' => 'required|min:3',
                'surname' => 'required|min:3',
                'email' => 'required',
                'phone' => 'required|numeric',
                'city' => 'required|min:3',
                'status' => $customerStatus
            ]
        );

        $customer = Customer::create($attributes);


        dd($customer);
        //dd(request()->all());


        if(request('status') !== 'f'){

            $companyAttributes =request()->validate(
                [   
                    'company_id' => 'required|numberic',
                    'company_address' => 'required',
                    'assignee' => 'required'
                ]
            );

            CustomerCompanyInfo::create($companyAttributes)->save();
            $customer::create($attributes)->save();
        } else {
           
            $customer::create($attributes)->save();
        }

        //Customer::create($attributes)->save();
       
        // // course prices
        // $idKurseva = [$kurs1, $kurs2];
        // $cijenaKurseva = 0;
        // foreach($idKurseva as $id){
        //     $kurs = Course::where('id', $id)->get();
        //     $cijena_kursa = $kurs->pluck('price');
        //     //$cijenaKurseva += $cijena_kursa[0];
        //     $cijenaKurseva = [$cijena_kursa[0]];
        // }

        return view('/');

    }

}
