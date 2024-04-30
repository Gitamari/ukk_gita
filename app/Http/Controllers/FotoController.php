<?php

namespace App\Http\Controllers;

use App\Models\album;
use App\Models\foto;
use App\Models\like;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class FotoController extends Controller
{
    /**
     * Retrieves the albums associated with the authenticated user and returns the view for the 'dashboard.foto' page.
     *
     * @throws Some_Exception_Class description of exception
     * @return \Illuminate\Contracts\View\View The view for the 'dashboard.foto' page.
     */
    public function index()
    {
        $albums = album::where('user_id', auth()->id())->get();
        return view('dashboard.foto', ['albums' => $albums]);
    }

    /**
     * Validates the request data, stores the image file, generates the image URL, creates a new foto object,
     * saves it to the database, and redirects to the dashboard with a success message.
     *
     * @param Request $request The HTTP request object containing the foto data.
     * @throws \Illuminate\Validation\ValidationException If the validation fails.
     * @return \Illuminate\Http\RedirectResponse The redirect response to the dashboard.
     */
    public function post(Request $request)
    {
        $validatedData = $request->validate([
            'judulFoto' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:1000',
            'lokasifile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'album_id' => 'required|exists:album,id',
        ]);

        $fotoPath = $request->file('lokasifile')->store('public/potos');

        $fotoUrl = URL::to('/').Storage::url($fotoPath);

        $foto = new foto([
            'judulFoto' => $validatedData['judulFoto'],
            'deskripsi' => $validatedData['deskripsi'],
            'tanggalUnggah' => Carbon::now()->format('Y-m-d'),
            'lokasifile' => $fotoUrl,
            'user_id' => auth()->id(),
            'album_id' => $validatedData['album_id'],
        ]);

        $foto->save();

        return redirect()->route('dashboard')->with('success', 'Foto berhasil ditambahkan!');
    }

    /**
     * Deletes a photo based on the provided ID, redirects to the dashboard, and displays a success message.
     *
     * @param datatype $id The ID of the photo to be deleted.
     * @throws Some_Exception_Class description of exception
     * @return Some_Return_Value The redirect response to the dashboard with a success message.
     */
    public function delete($id)
    {
        $fotos = foto::where('id', $id)->first();
        $fotos->delete();
        return redirect()->route('dashboard')->with('success', 'Foto berhasil dihapus!');
    }

    /**
     * Handles the like functionality for a photo.
     *
     * @param int $id The ID of the photo to be liked.
     * @return \Illuminate\Http\RedirectResponse The redirect response to the previous page.
     */
    public function like($id)
    {
        $photo = foto::find($id);
        if (!$photo) {
            return redirect()->back()->with('error', 'Foto tidak ditemukan.');
        }

        $user_id = auth()->id();

        $existingLike = like::where('user_id', $user_id)
                                ->where('foto_id', $photo->id)
                                ->first();

        if ($existingLike) {
            $existingLike->delete();
            session()->flash('success', 'Foto tidak disukai lagi.');
        } else {
        $like = new like([
            'foto_id' => $photo->id,
            'user_id' => $user_id,
            'tanggalLike' => Carbon::now()->format('Y-m-d'),
            'likeName' => auth()->user()->name,
            ]);
            $like->save();
            session()->flash('success', 'Foto disukai!');
        }
        return redirect()->back();
    }
}
