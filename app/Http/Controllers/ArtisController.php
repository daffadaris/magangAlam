<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ArtisController extends Controller
{
    public function show()
    {
    	// mengambil data dari table artis
    	$artis = DB::table('artis')
            ->leftjoin('negara', 'negara.kd_negara', '=', 'artis.negara')
            ->get();
        $negara = DB::table('negara')
            ->get();
        $artiss = DB::table('artis')
        ->first();
    	// mengirim data artis ke view index
    	return view('artis',compact('artis','negara','artiss'));

    }
    public function add()
    {
        $artis = DB::table('artis')
        ->get();
        $negara = DB::table('negara')
        ->get();
        return view('addartis',compact('artis','negara'));
    }
    public function store(Request $request)
    {

	DB::table('artis')
    ->insert([
        'kd_artis' => $request->kode,
		'nm_artis' => $request->artis,
		'jk' => $request->jk,
		'negara' => $request->negara,
        'bayaran' => $request->bayaran,
        'award' => $request->award
	]);
	return redirect('/artis');
    }

    public function edit($id)
    {
	// mengambil data artis berdasarkan id yang dipilih
	$artis = DB::table('artis')->where('kd_artis',$id)
    ->leftjoin('negara', 'negara.kd_negara', '=', 'artis.negara')
    ->get();
    $negara = DB::table('negara')
    ->get();
    return view('editartis',compact('artis','negara'));

    }
    public function update(Request $request)
    {
	DB::table('artis')->where('kd_artis',$request->kode)->update([
		'nm_artis' => $request->artis,
		'jk' => $request->jk,
		'negara' => $request->negara,
        'bayaran' => $request->bayaran,
        'award' => $request->award
	]);
	return redirect('/artis');
    }
    public function delete($id)
    {
	// menghapus data pegawai berdasarkan id yang dipilih
	DB::table('artis')->where('kd_artis',$id)->delete();

	// alihkan halaman ke halaman artis
	return redirect('/artis');
    }
}
