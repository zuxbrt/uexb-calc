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
        // basic info
        $ime = request('ime');
        $prezime = request('prezime');
        $email = request('email');
        $telefon = request('telefon');
        $lice = request('lice');

        // info za pravna lica
        $idFirme = request('idFirme');
        $adresaFirme = request('adresaFirme');
        $odgovornoLice = request('odgovornoLice');

        // info za fizicka lica
        // $jmbg = request('jmbg');

        // kupon za popust (ako ga ima)
        $popustKupon = request('popustKupon');

        // podatci o izabranim kursevima
        $kurs1 = request('kurs1');
        $polaznici1kurs = request('polaznici1kurs');
        $kurs2 = request('kurs2');
        $polaznici2kurs = request('polaznici2kurs');
        $ukupanBrojPolaznika = $polaznici1kurs + $polaznici2kurs;

        // dobivanje cijene svih izabranih kurseva
        $idKurseva = [$kurs1, $kurs2];
        $cijenaKurseva = 0;
        foreach($idKurseva as $id){
            $kurs = Course::where('id', $id)->get();
            $cijena_kursa = $kurs->pluck('price');
            //$cijenaKurseva += $cijena_kursa[0];
            $cijenaKurseva = [$cijena_kursa[0]];
        }

        dd($cijenaKurseva);

        // definisanje popusta na kurseve na osnovu broja polaznika
        $popust = 0;

        if($ukupanBrojPolaznika >= 1 && $ukupanBrojPolaznika <= 2){
            $popust = 5;
        } elseif($ukupanBrojPolaznika >= 3 && $ukupanBrojPolaznika <= 5){
            $popust = 10;
        } elseif($ukupanBrojPolaznika >= 6 && $ukupanBrojPolaznika <= 10){
            $popust = 15;
        } elseif($ukupanBrojPolaznika >= 11 && $ukupanBrojPolaznika <= 15){
            $popust = 20;
        } elseif($ukupanBrojPolaznika >= 15 && $ukupanBrojPolaznika <= 20){
            $popust = 25;
        } elseif($ukupanBrojPolaznika >= 21){
            $popust = 30;
        } else {
            $popust = 0;
        }
       
        if($popust === 0){
            $total = $cijenaKurseva;
        } else {
            $iznosPopusta = ($popust / 100) * $cijenaKurseva;
            $total = $cijenaKurseva - $iznosPopusta;
        }

        dd($total);
    }

}
