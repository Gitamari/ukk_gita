<?php

namespace App\Http\Controllers;

use App\Models\album;
use App\Models\foto;
use App\Models\komentar;
use App\Models\like;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Retrieves all photos, counts the number of likes and comments for each photo,
     * and returns a view with the photos, like counts, and comment counts.
     *
     * @return \Illuminate\Contracts\View\View The view for the 'welcome' page.
     */
    public function index()
    {
        $fotos = foto::all();
        $likeCount = [];
        $komentarCount = [];

        foreach ($fotos as $foto) {
            $likeCount[$foto->id] = like::where('foto_id', $foto->id)->count();
            $komentarCount[$foto->id] = komentar::where('foto_id', $foto->id)->count();
        }

        return view('welcome', compact('fotos', 'likeCount', 'komentarCount'));
    }

    public function back(Request $request)
    {
        return redirect()->back();
    }
}
