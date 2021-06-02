<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use \App\Models\Horoscope;

class HoroscopeController extends Controller
{
    public function index() {
        return view('horoscope.index');
    }

    public function getDate(Request $request) {
        $input_date = $request->input('input_date');
        // format check

        $query_result = DB::table('horoscopes')
            ->whereMonth('start_date', '=', date("m",strtotime($input_date)))
            ->orWhereMonth('end_date', '=', date("m",strtotime($input_date)))
            ->orderBy('start_date')
            ->get();
        $otherResult = Horoscope::all();
        $result = "";

        if (date("m",strtotime($input_date)) ==  1) {
            if ( date("d",strtotime($input_date)) < date("d", strtotime($query_result[1]->start_date)) ) {
                $result = $query_result[1]->name;
            }
            else {
                $result = $query_result[0]->name;
            }
        }
        else {
            if ( date("d",strtotime($input_date)) < date("d", strtotime($query_result[1]->start_date)) ) {
                $result = $query_result[0]->name;
            }
            else {
                $result = $query_result[1]->name;
            }
        }

        $full_table = DB::table('horoscopes')
            ->get();

        return view('horoscope.index', ['horoscope_sign' => $result, 'horoscope_table' => $full_table]);
    }
}
