<?php

namespace App\Http\Controllers;

use App\Models\Tautan;
use App\Models\Contact;
use Illuminate\Http\Request;

class TautanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tautan = Tautan::all();
        $notifikasi = Contact::all();
        $notip = Contact::latest()->paginate(3);

        return view('admin-page.tautan.index', compact('tautan', 'notip', 'notifikasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-page.tautan.create');
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
            'nama' => 'required',
            'link' => 'required',
            'waktu' => 'required',
            'deskripsi' => 'required',
        ]);


        Tautan::create($validateData);

        return redirect('/admin-page/tautan')
            ->with('success', 'Sukses Menambah data2');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tautan  $tautan
     * @return \Illuminate\Http\Response
     */
    public function show(Tautan $tautan)
    {
        $notip = Contact::latest()->paginate(3);
        $notifikasi = Contact::all();
        return view('admin-page.tautan.show', compact('tautan', 'notip', 'notifikasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tautan  $tautan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tautan $tautan)
    {
        $notip = Contact::latest()->paginate(3);
        $notifikasi = Contact::all();
        return view('admin-page.tautan.edit', compact('tautan', 'notip', 'notifikasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tautan  $tautan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tautan $tautan)
    {

        $tautan = Tautan::find($tautan->id);


        $tautan->nama = $request->nama;
        $tautan->link = $request->link;
        $tautan->deskripsi = $request->deskripsi;
        $tautan->waktu = $request->waktu;


        $tautan->save();

        return redirect('/admin-page/tautan')
            ->with('success', 'Sukses Mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tautan  $tautan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tautan $tautan)
    {
        $tautan->delete();

        return redirect('/admin-page/tautan')
            ->with('success', 'Sukses Menghapus data.');
    }
}
