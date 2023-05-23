<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
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

        $artists = DB::table('artis')
            ->leftJoin('film', 'artis.kd_artis', '=', 'film.artis')
            ->whereNull('film.artis')
            ->get(['artis.*']);
        $artisMax = DB::table('artis')
            ->leftJoin('film', 'artis.kd_artis', '=', 'film.artis')
            ->select('artis.nm_artis', DB::raw('COUNT(film.artis) as film_count'))
            ->groupBy('artis.kd_artis', 'artis.nm_artis')
            ->orderByDesc('film_count')
            ->get(['artis.*']);

        $maximumCount = $artisMax->max('film_count');

        $artisM = $artisMax->filter(function ($artis) use ($maximumCount) {
            return $artis->film_count == $maximumCount;
        });

        $artisD = DB::table('artis')
            ->join('film', 'artis.kd_artis', '=', 'film.artis')
            ->join('genre', 'film.genre', '=', 'genre.kd_genre')
            ->where('genre.nm_genre', 'drama')
            ->select('artis.nm_artis')
            ->distinct()
            ->get();

        $produser = DB::table('produser')
            ->leftJoin('film', 'produser.kd_produser', '=', 'film.produser')
            ->select('produser.nm_produser', DB::raw('COALESCE(SUM(film.nominasi),0) as nomination_count'))
            ->groupBy('produser.kd_produser', 'produser.nm_produser')
            ->get();
        $totalRevenue = DB::table('produser')
            ->join('film', 'produser.kd_produser', '=', 'film.produser')
            ->where('produser.nm_produser', 'Marvel')
            ->sum('film.pendapatan');
        // mengirim data film ke view index
        return view('home', compact('film', 'mostNominasi', 'averagePendapatan', 'filmN', 'filmS', 'artists', 'artisM', 'artisD', 'produser', 'totalRevenue'));
    }
}
