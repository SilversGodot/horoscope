<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>
    <title>Horoscope</title>
</head>
<body>
    <h1>
        Horoscope Input Page
    </h1>
    <form action="{{ route('submit_date') }}" method='post'>
        {{ csrf_field() }}

        <p>Date: <input type="text" name="input_date" id="datepicker"></p>
        <input type="submit" value="Submit Date">
    </form>
    <p>{{ $horoscope_sign ?? '' }}</p>
    <table>
        <tr>
            <th>Name</th>
            <th>Start Date</th>
            <th>End Date</th>
        </tr>
        @forelse ($horoscope_table ?? [] as $row)
        <tr>
            <th>{{ $row->name }}</th>
            <th>{{ $row->start_date }}</th>
            <th>{{ $row->end_date }}</th>
        </tr>
        @empty
        @endforelse
    </table>
</body>
</html>