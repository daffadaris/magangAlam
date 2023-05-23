<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Styles -->
    <style>
    </style>
</head>

<body>
    <div class="container">
        <h1>Welcome to the Homepage</h1>
        <a href="/artis" class="link">View Artis</a>
        <a href="/film" class="link">View Film</a>
    </div>
    <h2>1.Incremen</h2>
    @php
        for ($i = 1; $i <= 10; $i++) {
            // Increment variabel $i
            $i;
            echo 'Nilai i: ' . $i . '<br>';
        }
    @endphp
    <h2>2.Elemen Array</h2>
    @php
        $array = ['elemen1', 'elemen2', 'elemen3'];

        foreach ($array as $elemen) {
            echo $elemen . '<br>';
        }

    @endphp
    <h2>3.Fibonacci</h2>
    @php
        $n1 = 0;
        $n2 = 1;
        $fibonacci = [];

        while ($n1 <= 100) {
            $fibonacci[] = $n1;
            $n3 = $n1 + $n2;
            $n1 = $n2;
            $n2 = $n3;
        }

        // Menampilkan deret Fibonacci
        foreach ($fibonacci as $angka) {
            echo $angka . ' ';
        }

    @endphp
    <h2>4.Kelipatan 4</h2>
    @php
        for ($i = 1; $i <= 100; $i++) {
            if ($i % 4 === 0) {
                echo $i . ' ';
            }
        }
    @endphp
    <div class="container">
        <h2>Film dan nominasi dari nominasi yang terbesar
        </h2>
    </div>
    <table border="1" class="table">
        <tr>
            <th>Film</th>
            <th>Nominasi</th>
        </tr>
        @foreach ($film as $f)
            <tr>
                <td>{{ $f->nm_film }}</td>
                <td>{{ $f->nominasi }}</td>

            </tr>
        @endforeach
    </table>
    </br>
    <h2>Film dengan nominasi terbanyak</h2>
    <table border="1" class="table">
        <thead>
            <tr>
                <th>Film</th>
                <th>Nominasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mostNominasi as $m)
                <tr>
                    <td>{{ $m->nm_film }}</td>
                    <td>{{ $m->nominasi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </br>
    <h2>Average Film Income</h2>
    <p>{{ $averagePendapatan }}</p>
    </br>
    <!-- films_with_last_letter_n-->
    <h2>Film dengan huruf terakhir n</h2>
    <table border="1" class="table">
        <thead>
            <tr>
                <th>Film</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($filmN as $FN)
                <tr>
                    <td>{{ $FN->nm_film }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </br>
    <h2>Film dengan Pendapatan Terbesar Mengandung Huruf ‘s’
    </h2>
    @if ($filmS)
        <p>{{ $filmS->nm_film }}</p>
    @else
        <p>No films found.</p>
    @endif
    </br>
    <h2>Artis tidak main film</h2>
    <table border="1" class="table">
        <thead>
            <tr>
                <th>Artis</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($artists as $a)
                <tr>
                    <td>{{ $a->nm_artis }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </br>
    <h2>Artis dengan Film Terbanyak</h2>
    <table border="1" class="table">
        <thead>
            <tr>
                <th>Artis</th>
                <th>Jumlah Film</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($artisM as $aM)
                <tr>
                    <td>{{ $aM->nm_artis }}</td>
                    <td>{{ $aM->film_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </br>
    <h2>Artis Main Film Drama</h2>
    @foreach ($artisD as $aD)
        <p>{{ $aD->nm_artis }}</p>
    @endforeach
    </br>
    <h2>Total Nominasi Produser</h2>
    @foreach ($produser as $p)
        <p>{{ $p->nm_produser }} - Total Nominations: {{ $p->nomination_count }}</p>
    @endforeach
    </br>
    <h2>Total Pendapatan Produser Marvel: </h2>
    <p>{{ $totalRevenue }}</p>
</body>

</html>
