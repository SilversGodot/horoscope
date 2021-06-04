<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use \App\Models\Horoscope;

class HoroscopeController extends Controller
{
    public function index() {
        return view('horoscope.index');
    }

    public function getDate(Request $request) {
        $input_date = $request->input('input_date');

        // TODO implement format check method

        $horoscope = $this->getHoroscope($input_date);
        $horoscopeList = $this->getHoroscopeList();

        return view('horoscope.index', ['horoscope_sign' => $horoscope, 'horoscope_table' => $horoscopeList]);
    }

    public function getHoroscopeAjax(Request $request)
    {
        $input_date = $request->input('input_date');
        // format check

        $horoscope = $this->getHoroscope($input_date);
        
        return response() -> json(['Horoscope' => $horoscope]);
    }

    public function getHoroscopeListAjax()
    {
        $horoscopeList = $this->getHoroscopeList();
        
        return response() -> json($horoscopeList);
    }

    private function getHoroscopeList()
    {
        return DB::table('horoscopes') ->get();
    }

    private function getHoroscope(string $input_date)
    {
        $query_result = DB::table('horoscopes')
            ->whereMonth('start_date', '=', date("m", strtotime($input_date)))
            ->orWhereMonth('end_date', '=', date("m", strtotime($input_date)))
            ->orderBy('start_date')
            ->get();

        $result = "";

        if (date("m", strtotime($input_date)) ==  1) {
            if ( date("d", strtotime($input_date)) < date("d", strtotime($query_result[1]->start_date))) {
                $result = $query_result[1]->name;
            }
            else {
                $result = $query_result[0]->name;
            }
        }
        else {
            if ( date("d", strtotime($input_date)) < date("d", strtotime($query_result[1]->start_date))) {
                $result = $query_result[0]->name;
            }
            else {
                $result = $query_result[1]->name;
            }
        }

        return $result;
    }
}
