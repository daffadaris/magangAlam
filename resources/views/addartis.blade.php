<!DOCTYPE html>
<html>
<head>
</head>
<body>

	<h3>Tambahkan artis</h3>

	<a href="/artis"> Kembali</a>

	<br/>
	<br/>
    @php
    $lastValue = DB::table('artis')->max('kd_artis');
    $number = (int) substr($lastValue, 1);
    $incrementedNumber = $number + 1;
    $incrementedValue = 'F' . str_pad($incrementedNumber, 3, '0', STR_PAD_LEFT);
    @endphp

	<form action="/artis/store" method="post">
		{{ csrf_field() }}
		Nama <input type="text" name="artis" required="required"> <br/>
            <input name="kode" value={{ $incrementedValue }} hidden>
        <label for="jk">jenis kelamin
            <select id="jk" name="jk">
              <option value=PRIA>PRIA</option>
              <option value=WANITA>WANITA</option>
            </select>
        </label><br/>
		Bayaran <input type="number" name="bayaran" required="required"> <br/>
        Award <input type="number" name="award" placeholder="0" value="0"> <br/>
        <label for="negara">Asal Negara
            <select id="negara" name="negara">
              @foreach ($negara as $n)
              <option value={{$n->kd_negara}}>{{$n->nm_negara}}</option>
              @endforeach
            </select>
        </label><br/>
		<input type="submit" value="Simpan Data">
	</form>
</body>
</html>
