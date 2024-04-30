<?php

namespace App\Http\Controllers;

use App\Models\foto;
use App\Models\komentar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    /**
     * Retrieves the comments associated with a specific photo and returns the view for the 'dashboard.komentar' page.
     *
     * @param int $id The ID of the photo.
     * @return \Illuminate\Contracts\View\View The view for the 'dashboard.komentar' page.
     */
    public function index($id)
    {
        $photo = foto::find($id);
        $komentar = $photo->comments()->get();

        return view('dashboard.komentar', compact('komentar', 'photo'));
    }

    /**
     * Validates the request, creates a new comment, and saves it to the database.
     *
     * @param Request $request the HTTP request object containing the comment data
     * @throws Some_Exception_Class if the request fails validation
     * @return \Illuminate\Http\RedirectResponse a redirect response to the previous page with a success message
     */
    public function post(Request $request)
    {
        $request->validate([
            'comment' => 'required',
        ]);
        $comment = new komentar();
        $comment->foto_id = $request->input('foto_id');
        $comment->user_id = Auth::id();
        $comment->komentarName = Auth::user()->name;
        $comment->isiKomentar = $request->input('comment');
        $comment->tanggalKomentar = Carbon::now()->format('Y-m-d');
        $comment->save();

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
    }
}
