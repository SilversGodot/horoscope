<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persons = Person::all();
        return view('person.index', ['persons' => $persons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('person.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input_date = $request->input('birthday');
        // format check

        $query_result = DB::table('horoscopes')
            ->whereMonth('start_date', '=', date("m",strtotime($input_date)))
            ->orWhereMonth('end_date', '=', date("m",strtotime($input_date)))
            ->orderBy('start_date')
            ->get();
        $horoscope_result = "";

        if (date("m",strtotime($input_date)) ==  1) {
            if ( date("d",strtotime($input_date)) < date("d", strtotime($query_result[1]->start_date)) ) {
                $horoscope_result = $query_result[1]->name;
            }
            else {
                $horoscope_result = $query_result[0]->name;
            }
        }
        else {
            if ( date("d",strtotime($input_date)) < date("d", strtotime($query_result[1]->start_date)) ) {
                $horoscope_result = $query_result[0]->name;
            }
            else {
                $horoscope_result = $query_result[1]->name;
            }
        }

        // dd($horoscope_result);

        $newPerson = Person::create([
            'first_name' => $request->input('fname'),
            'last_name' => $request->input('lname'),
            'house_number' => $request->input('house_number'),
            'street_name' => $request->input('street_name'),
            'street_type' => $request->input('street_type'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'postal_code' => $request->input('postal_code'),
            'birthday' => $request->input('birthday'),
            'gender' => $request->input('gender'),
            'horoscope' => $horoscope_result
        ]);

        return redirect('/person/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
