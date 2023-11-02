<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Berita;
use App\Models\Document;
use App\Models\Contact;
use App\Models\Tautan;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Session;


use Illuminate\Routing\Controller;




class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Kategori $kategori)
    {

        $kategori = Kategori::all();
        $notip = Contact::latest()->paginate(3);
        $notifikasi = Contact::all();
        return view('admin-page.kategori.index', compact('kategori',  'notip', 'notifikasi',));
    }





    public function kategori(Kategori $kategori, Berita $berita)
    {

        $baru = Kategori::all();
        $tautan = Tautan::latest()->paginate(3);
        $document = Document::latest()->paginate(3);
        $berita = Berita::where('kategoriId', $kategori->id)->latest()->paginate(5);

        return view('landing-page.berita', compact('berita', 'baru', 'document', 'tautan'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-page.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Kategori $kategori)
    {
        $validatedData = $request->validate([
            'nama' => 'required|unique:kategori,nama',
        ]);




        $cekdata = Kategori::where('nama', $kategori->nama)->count();

        if ($cekdata > 0) {
            return redirect()->back()->with('error', 'Data Duplicate');
        } else {
            $validatedData['nama'] = Str::title($request->nama);
            Kategori::create($validatedData);
            return redirect('/admin-page/kategori')
                ->with('success', 'Sukses Menambah data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        $notip = Contact::latest()->paginate(3);
        $notifikasi = Contact::all();
        return view('admin-page.kategori.show', compact('kategori', 'notip', 'notifikasi',));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        $notip = Contact::latest()->paginate(3);
        $notifikasi = Contact::all();
        return view('admin-page.kategori.edit', compact('kategori', 'notip', 'notifikasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        if ($request->slug == $kategori->slug) {
            $validatedData = $request->validate([
                'nama' => 'required|unique:kategori,nama',
            ]);
        } else {
            $validatedData = $request->validate([
                'nama' => 'required|unique:kategori,nama',
            ]);
        }

        // $cekdata = Kategori::where('nama', $kategori->nama)->count();

        // if ($cekdata > 0) {
        //     return with('error', 'The nama has already been taken.');
        // } else {

        $validatedData['slug'] = Str::slug($request->nama);
        $kategori->update($validatedData);

        return redirect('/admin-page/kategori')
            ->with('success', ' Berhasil Di Update');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        $cek = Berita::where('kategoriId', $kategori->id)->count();
        if ($cek == 0) {
            $kategori->delete();
            return redirect('/admin-page/kategori')->with('success', 'Berhasil Menghapus data');
        } else {
            return redirect()->back()->with('error', 'Tidak bisa dihapus karena ada data yang terkait !');
        }
    }

    public function slugest(request $request)
    {
        $slug = Str::slug($request->nama, '-');
        return response()->json(['slug' => $slug]);
    }
}
