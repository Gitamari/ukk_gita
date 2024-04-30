<?php

namespace App\Http\Controllers;

use App\Models\album;
use App\Models\foto;
use App\Models\komentar;
use App\Models\like;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Retrieves the photos and albums associated with the authenticated user,
     * along with the count of likes and comments for each photo.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View The dashboard view with the retrieved data.
     */
    public function index()
    {
        $fotos = foto::where('user_id', auth()->id())->get();
        $albums = album::where('user_id', auth()->id())->get();
        $likeCount = [];
        $komentarCount = [];

        foreach ($fotos as $foto) {
            $likeCount[$foto->id] = like::where('foto_id', $foto->id)->count();
            $komentarCount[$foto->id] = komentar::where('foto_id', $foto->id)->count();
        }

        return view('dashboard.dashboard', compact('fotos', 'albums', 'likeCount', 'komentarCount'));
    }

    /**
     * Retrieves the photos and albums associated with the authenticated user,
     * along with the count of likes and comments for each photo.
     *
     * @param int $album_id The ID of the album to sort by.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View The dashboard view with the retrieved data.
     */
    public function sort($album_id)
    {
        $fotos = foto::where('user_id', auth()->id())
            ->where('album_id', $album_id)
            ->get();

        $albums = album::where('user_id', auth()->id())->get();
        $likeCount = [];
        $komentarCount = [];

        foreach ($fotos as $photo) {
            $likeCount[$photo->id] = like::where('foto_id', $photo->id)->count();
            $komentarCount[$photo->id] = komentar::where('foto_id', $photo->id)->count();
        }

        return view('dashboard.dashboard', ['fotos' => $fotos, 'likeCount' => $likeCount, 'albums' => $albums, 'komentarCount' => $komentarCount]);
    }

}
