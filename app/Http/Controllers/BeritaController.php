<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Berita;
use App\Models\Document;
use App\Models\Kategori;
use App\Models\Contact;
use App\Models\Tautan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
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
        $notip = Contact::latest()->paginate(3);
        $notifikasi = Contact::all();
        return view('admin-page.berita.index', compact('berita', 'kategori', 'notip', 'notifikasi'));
    }


    public function berita()
    {
        $berita = Berita::all();
        $kategori = Kategori::all();
        $baru = Kategori::all();
        $document = Document::latest()->paginate(4);
        $tautan = Tautan::latest()->paginate(4);
        $berita = Berita::latest()->paginate(6);

        return view('landing-page.berita', compact('berita', 'kategori', 'baru', 'document', 'tautan'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }


    public function detil(Berita $berita, Request $request)
    {

        $expireAt = now()->addHours(1);

        views($berita)
            ->cooldown($expireAt)
            ->record();

        $totalViews = views($berita)
            ->count();

        $document = Document::latest()->paginate(4);

        $tautan = Tautan::latest()->paginate(3);

        $rekom = Berita::latest()->paginate(3);

        return view('landing-page.berita-detil', compact('berita', 'totalViews', 'document', 'rekom', 'tautan'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin-page.berita.index', compact('kategpri'));
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
            'kategoriId' => 'required',
            'title' => 'required|max:255',
            'foto' => 'required|mimes:jpg,jpeg,png',
            'body' => 'required',
        ]);


        $newName = '';

        if ($request->file('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = 'berita-' . now()->timestamp . '.' . $extension;
            $validateData['foto'] = $request->file('foto')->storeAs('berita', $newName);
        }


        $validateData['title'] = Str::title($request->title);
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        $validateData['published_at'] = now();


        Berita::create($validateData);

        return redirect('/admin-page/berita')
            ->with('success', 'Sukses Menambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        $notip = Contact::latest()->paginate(3);
        $notifikasi = Contact::all();
        $kategori = Kategori::all();
        return view('admin-page.berita.show', compact('berita', 'kategori', 'notip', 'notifikasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $berita)
    {
        $notip = Contact::latest()->paginate(3);
        $notifikasi = Contact::all();
        $kategori = Kategori::all();
        return view('admin-page.berita.edit', compact('berita', 'kategori', 'notip', 'notifikasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $berita, $id)
    {


        $berita = Berita::find($id);

        $berita->kategoriId = $request->kategoriId;
        $berita->title = $request->title;
        $berita->slug = Str::slug($berita->title, '-');
        $berita->excerpt = $request->body;
        $berita->body = $request->body;


        $newName = '';

        if ($request->file('foto')) {

            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = 'berita-' . now()->timestamp . '.' . $extension;
            $berita->foto = $request->file('foto')->storeAs('berita', $newName);
        } else {
            $berita->foto = $request->oldImage;
        }





        $berita->published_at = now();
        $berita->save();

        return redirect('/admin-page/berita')
            ->with('success', 'Sukses Mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $berita)
    {
        if ($berita->foto) {
            Storage::delete($berita->foto);
        }

        Berita::destroy($berita->id);

        return redirect('/admin-page/berita')
            ->with('success', 'Sukses Menghapus data.');
    }


    public function checkSlug(Request $request)
    {
        $slug = Str::slug($request->title, '-');
        return response()->json(['slug' => $slug]);
    }
}
