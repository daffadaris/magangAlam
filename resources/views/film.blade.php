<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
    <!-- Styles -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body>
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <a href="/">
                    <h1 class="title">MagangAlam</h1>
                </a>
            </div>

            <a href="/film/tambah"> + Tambah Film Baru</a>
            <table border="1" class="table">
                <tr>
                    <th>Film</th>
                    <th>Bintang</th>
                    <th>Genre</th>
                    <th>Produser</th>
                    <th>Pendapatan</th>
                    <th>Nominasi</th>
                </tr>
                @foreach ($film as $f)
                    <tr>
                        <td>{{ $f->nm_film }}</td>
                        <td>{{ $f->nm_artis }}</td>
                        <td>{{ $f->nm_genre }}</td>
                        <td>{{ $f->nm_produser }}</td>
                        <td>{{ $f->pendapatan }}</td>
                        <td>{{ $f->nominasi }}</td>
                        <td>
                            <a href="/film/edit/{{ $f->kd_film }}">Edit</a>
                            |
                            <a href="/film/hapus/{{ $f->kd_film }}">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            </br>

        </div>
    </div>
</body>

</html>
