<?php

namespace App\Http\Controllers;

use App\Models\album;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDO;

class AlbumController extends Controller
{
    /**
     * Retrieves the view for the 'dashboard.album' page.
     *
     * @return \Illuminate\Contracts\View\View The view for the 'dashboard.album' page.
     */
    public function index()
    {
        return view('dashboard.album');
    }

    /**
     * Store a new album in the database.
     *
     * @param Request $request The HTTP request object containing the album data.
     * @return \Illuminate\Http\RedirectResponse A redirect response to the previous page with a success message.
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaAlbum' => 'required|string|max:100',
            'deskripsi' => 'required|string',
        ]);

        album::create([
            'namaAlbum' => $request->namaAlbum,
            'deskripsi' => $request->deskripsi,
            'tanggalDibuat' => Carbon::now()->format('Y-m-d'),
            'user_id' => auth()->id(),
        ]);

        return redirect()->back()->with('succes', 'Berhasil menambahkan Data album');
    }
}
