<!DOCTYPE html>
<html>
<head>
</head>
<body>

	<h3>Tambahkan Film</h3>

	<a href="/"> Kembali</a>

	<br/>
	<br/>
    @php
    $lastValue = DB::table('film')->max('kd_film');
    $number = (int) substr($lastValue, 1);
    $incrementedNumber = $number + 1;
    $incrementedValue = 'F' . str_pad($incrementedNumber, 3, '0', STR_PAD_LEFT);
    @endphp

	<form action="/Film/store" method="post">
		{{ csrf_field() }}
		Judul <input type="text" name="film" required="required"> <br/>
            <input name="kode" value={{ $incrementedValue }} hidden>
        <label for="genre">Genre
            <select id="genre" name="genre">
              @foreach ($genre as $g)
              <option value={{$g->kd_genre}}>{{$g->nm_genre}}</option>
              @endforeach
            </select>
        </label><br/>
        <label for="artis">artis
            <select id="artis" name="artis">
              @foreach ($artis as $a)
              <option value={{$a->kd_artis}}>{{$a->nm_artis}}</option>
              @endforeach
            </select>
        </label><br/>
        <label for="produser">produser
            <select id="produser" name="produser">
              @foreach ($produser as $p)
              <option value={{$p->kd_produser}}>{{$p->nm_produser}}</option>
              @endforeach
            </select>
        </label><br/>
		Pendapatan <input type="number" name="pendapatan" required="required"> <br/>
        Nominasi <input type="number" name="nominasi" placeholder="0" value="0"> <br/>
		<input type="submit" value="Simpan Data">
	</form>

</body>
</html>
