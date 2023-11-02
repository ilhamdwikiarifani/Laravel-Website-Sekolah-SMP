<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth;
use App\Models\Galeri;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeri = Galeri::all();
        $notifikasi = Contact::all();
        $notip = Contact::latest()->paginate(3);

        return view('admin-page.galeri.index', compact('galeri', 'notip', 'notifikasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-page.galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'foto' => 'required|mimes:jpg,jpeg,png',
            'waktu' => 'required',
            'caption' => 'required',
        ]);


        $newName = '';

        if ($request->file('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = 'galeri-' . now()->timestamp . '.' . $extension;
            $validateData['foto'] = $request->file('foto')->storeAs('galeri', $newName);
        }

        Galeri::create($validateData);

        return redirect('/admin-page/galeri')
            ->with('success', 'Sukses Menambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function show(Galeri $galeri)
    {
        $notip = Contact::latest()->paginate(3);
        $notifikasi = Contact::all();
        return view('admin-page.galeri.show', compact('galeri', 'notip', 'notifikasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeri $galeri)
    {
        $notip = Contact::latest()->paginate(3);
        $notifikasi = Contact::all();
        return view('admin-page.galeri.edit', compact('galeri', 'notip', 'notifikasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galeri $galeri)
    {
        $validateData = $request->validate([
            'foto' => 'image|mimes:jpg,jpeg,png',
            'waktu' => 'required',
            'caption' => 'required',
        ]);

        $newName = '';

        if ($request->file('foto')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = 'galeri-' . now()->timestamp . '.' . $extension;
            $validateData['foto'] = $request->file('foto')->storeAs('galeri', $newName);
        } else {
            $validateData['foto'] = $request->oldImage;
        }

        Galeri::where('id', $galeri->id)
            ->update($validateData);

        return redirect('/admin-page/galeri')
            ->with('success', 'Sukses Update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeri $galeri)
    {

        if ($galeri->foto) {
            Storage::delete($galeri->foto);
        }

        Galeri::destroy($galeri->id);

        return redirect('/admin-page/galeri')
            ->with('success', 'Sukses Menghapus data.');
    }
}
