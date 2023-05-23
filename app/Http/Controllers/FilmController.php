<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    //
    public function show()
    {
        // mengambil data dari table film
        $film = DB::table('film')
            ->leftjoin('genre', 'genre.kd_genre', '=', 'film.genre')
            ->leftjoin('artis', 'artis.kd_artis', '=', 'film.artis')
            ->leftjoin('produser', 'produser.kd_produser', '=', 'film.produser')
            ->orderByDesc('nominasi')
            ->get();

        $mostNominasi = DB::table('film')
            ->select('nm_film', 'nominasi')
            ->where('nominasi', function ($query) {
                $query->select(DB::raw('MAX(nominasi)'))
                    ->from('film');
            })
            ->get();

        $averagePendapatan = DB::table('film')->average('pendapatan');

        $filmN = DB::table('film')
            ->whereRaw("RIGHT(nm_film, 1) = 'n'")
            ->get();

        $filmS = DB::table('film')
            ->where('nm_film', 'like', '%s%')
            ->orderBy('pendapatan', 'desc')
            ->first();
        // mengirim data film ke view index
        return view('film', compact('film', 'mostNominasi', 'averagePendapatan', 'filmN', 'filmS'));
    }

    public function add()
    {
        $film = DB::table('film')
            ->get();
        $genre = DB::table('genre')
            ->get();
        $artis = DB::table('artis')
            ->get();
        $produser = DB::table('produser')
            ->get();
        return view('add', compact('film', 'genre', 'artis', 'produser'));
    }
    public function store(Request $request)
    {

        DB::table('film')
            ->insert([
                'kd_film' => $request->kode,
                'nm_film' => $request->film,
                'artis' => $request->artis,
                'genre' => $request->genre,
                'produser' => $request->produser,
                'pendapatan' => $request->pendapatan,
                'nominasi' => $request->nominasi
            ]);
        return redirect('/film');
    }

    public function edit($id)
    {
        // mengambil data film berdasarkan id yang dipilih
        $film = DB::table('film')->where('kd_film', $id)
            ->leftjoin('genre', 'genre.kd_genre', '=', 'film.genre')
            ->leftjoin('artis', 'artis.kd_artis', '=', 'film.artis')
            ->leftjoin('produser', 'produser.kd_produser', '=', 'film.produser')
            ->get();
        $genre = DB::table('genre')
            ->get();
        $artis = DB::table('artis')
            ->get();
        $produser = DB::table('produser')
            ->get();
        return view('edit', compact('film', 'genre', 'artis', 'produser'));
    }
    public function update(Request $request)
    {
        DB::table('film')->where('kd_film', $request->kode)->update([
            'nm_film' => $request->film,
            'artis' => $request->artis,
            'genre' => $request->genre,
            'produser' => $request->produser,
            'pendapatan' => $request->pendapatan,
            'nominasi' => $request->nominasi
        ]);
        return redirect('/film');
    }
    public function delete($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('film')->where('kd_film', $id)->delete();

        // alihkan halaman ke halaman film
        return redirect('/');
    }
}
