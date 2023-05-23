<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
    <!-- Styles -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body>

	<h3>Edit film</h3>

	<a href="/"> Kembali</a>

	<br/>
	<br/>

	@foreach ($film as $f)
    <form action="/film/update" method="post">
        {{ csrf_field() }}
        <input name="kode" value="{{ $f->kd_film }}" hidden>
        Judul <input type="text" name="film" value="{{ $f->nm_film }}" required="required"> <br/>
        <label for="genre">Genre
            <select id="genre" name="genre">
                @foreach ($genre as $g)
                    <option value="{{ $g->kd_genre }}" {{ $g->kd_genre == $f->genre ? 'selected' : '' }}>
                        {{ $g->nm_genre }}
                    </option>
                @endforeach
            </select>
        </label><br/>
        <label for="artis">Artis
            <select id="artis" name="artis">
                @foreach ($artis as $a)
                    <option value="{{ $a->kd_artis }}" {{ $a->kd_artis == $f->artis ? 'selected' : '' }}>
                        {{ $a->nm_artis }}
                    </option>
                @endforeach
            </select>
        </label><br/>
        <label for="produser">Produser
            <select id="produser" name="produser">
                @foreach ($produser as $p)
                    <option value="{{ $p->kd_produser }}" {{ $p->kd_produser == $f->produser ? 'selected' : '' }}>
                        {{ $p->nm_produser }}
                    </option>
                @endforeach
            </select>
        </label><br/>
        Pendapatan <input type="number" name="pendapatan" value="{{ $f->pendapatan }}" required="required"> <br/>
        Nominasi <input type="number" name="nominasi" placeholder="0" value="{{ $f->nominasi }}"> <br/>
        <input type="submit" value="Simpan Data">
    </form>
@endforeach




</body>
</html>


