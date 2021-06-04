<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Obi Huang">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="apple-touch-icon" sizes="180x180" href="/icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/icon/favicon-16x16.png">
    <link rel="manifest" href="/icon/site.webmanifest">
    <link rel="mask-icon" href="/icon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >

    <title>Horoscope</title>
</head>
<body>
    <div class="header-row" id="header-row" style="padding: 0px; overflow:hidden; height:100px;">
        <div class="container-fluid" style="padding: 0px;">
            <div class="row"> 
                <div class="col-xs-12 text-center">
                    <img src="/img/banner.jpg" style="width: 100%;">
                </div>
            </div>
        </div>
    </div>
    <h1>
        Horoscope Input Page
    </h1>

    <div>
        <ul class='circle-container'>
            <li><img src='/img/Cancer.png'></li>
            <li><img src='/img/Leo.png'></li>   
            <li><img src='/img/Virgo.png'></li>
            <li><img src='/img/Libra.png'></li>
            <li><img src='/img/Scorpio.png'></li>
            <li><img src='/img/Sagittarius.png'></li>
            <li><img src='/img/Capricorn.png'></li>
            <li><img src='/img/Aquarius.png'></li>
            <li><img src='/img/Pisces.png'></li>
            <li><img src='/img/Aries.png'></li>
            <li><img src='/img/Taurus.png'></li>
            <li><img src='/img/Gemini.png'></li>         
            <li>
                <div class="text-white p-3 mb-4 text-center" style="transform: translate(0.25em, 3em);">
                    <form action="{{ route('submit_date') }}" method='post'>
                        {{ csrf_field() }}
                        <div>
                            <label class="form-label text-uppercase text-dark fw-bold">Birthday:</label>
                        </div>
                        <div>
                            <input type="date" id="datepicker" name="input_date" class="form-control text-dark fw-bold col-sm-3" style="color: transparent;" />
                        </div>         
                        <div class="p-3">
                            <button type="submit" class="btn btn-secondary mb-2">Submit</button> 
                        </div>                             
                    </form>
                </div>
            </li>       
        </ul>
    </div>

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