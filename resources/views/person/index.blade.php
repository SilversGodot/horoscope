@extends('layouts.app')

@section('content')
    <h1>Persons</h1>
    <table>
        <td>Horoscope</td>
        <td>Gender</td>
        <td>Count</td>
        @foreach ($persons ?? [] as $row)
        <tr>
            <td>{{ $row->horoscope }}</td>
            <td>{{ $row->gender }}</td>
            <td>{{ $row->count }}</td>
        </tr>
        @endforeach
    </table>
@endsection