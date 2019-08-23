<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Course;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $courses = Course::all();
        return view('welcome', compact('courses'));
    }

    public function store()
    {
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
    }
}
