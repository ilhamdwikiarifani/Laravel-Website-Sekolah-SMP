<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use App\Models\Document;
use App\Models\Galeri;
use App\Models\Struktur;
use App\Models\Contact;
use App\Models\Siswa;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = Berita::all();
        $kategori = Kategori::all();
        $siswa = Siswa::all();
        $galeri = Galeri::all();
        $struktur = Struktur::all();
        $notifikasi = Contact::all();
        $notip = Contact::latest()->paginate(3);

        return view('admin-page.dashboard', compact('berita', 'kategori', 'siswa', 'galeri', 'struktur', 'notip', 'notifikasi'));
    }

    public function Home(Request $request)
    {
        $berita = Berita::all();
        $kategori = Kategori::all();
        $berita = Berita::latest()->paginate(4);

        return view('landing-page.home', compact('berita', 'kategori'))
            ->with('i', (request()->input('page', 1) - 1) * 4);
    }



    public function Galeri()
    {
        $galeri = Galeri::latest()->paginate(6);

        return view('landing-page.galeri', compact('galeri'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
