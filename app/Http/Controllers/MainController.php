<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class MainController extends Controller
{

    public function index()
    {
        $courses = Course::all();
        return view('calculator', compact('courses'));
    }

    /**
    * Calculate customer's price of courses.
    */
    public function store()
    {
        dd(request()->all());

        $name = request('name');
        $surname = request('surname');
        $email = request('email');
        $phone = request('phone');
        $city = request('city');

        if(request('status') !== 'f'){
           $companyId = request('company_id');
           $companyAdress = request('company_address');
           $companyPerson = request('assignee');
        }
       
        // course prices
        $idKurseva = [$kurs1, $kurs2];
        $cijenaKurseva = 0;
        foreach($idKurseva as $id){
            $kurs = Course::where('id', $id)->get();
            $cijena_kursa = $kurs->pluck('price');
            //$cijenaKurseva += $cijena_kursa[0];
            $cijenaKurseva = [$cijena_kursa[0]];
        }

        dd($total);
    }

}
