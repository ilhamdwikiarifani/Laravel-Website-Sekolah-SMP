<?php

namespace App\Http\Controllers;

use App\Exports\StrukturExport;
use App\Models\Struktur;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class StrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $struktur = Struktur::all();
        $notip = Contact::latest()->paginate(3);
        $notifikasi = Contact::all();
        return view('admin-page.struktur.index', compact('struktur', 'notip', 'notifikasi'));
    }

    public function struktur()
    {
        $struktur = Struktur::all();

        return view('landing-page.struktursekolah', compact('struktur'));
    }


    public function exportstruktur()
    {
        $date = date('d-M-Y');
        return Excel::download(new StrukturExport, 'Struktur-' . $date . '.xlsx');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-page.struktur.create');
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
            'foto' => 'required|mimes:jpg,jpeg,png',
            'jabatan' => 'required',
            'status' => 'required',
            'deskripsi' => 'nullable',
        ]);


        $newName = '';

        if ($request->file('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = 'struktur-' . now()->timestamp . '.' . $extension;
            $validateData['foto'] = $request->file('foto')->storeAs('struktur', $newName);
        }

        Struktur::create($validateData);

        return redirect('/admin-page/struktur')
            ->with('success', 'Sukses Menambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function show(Struktur $struktur)
    {
        $notip = Contact::latest()->paginate(3);
        $notifikasi = Contact::all();
        return view('admin-page.struktur.show', compact('struktur', 'notip', 'notifikasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function edit(Struktur $struktur)
    {
        $notip = Contact::latest()->paginate(3);
        $notifikasi = Contact::all();
        return view('admin-page.struktur.edit', compact('struktur', 'notip', 'notifikasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Struktur $struktur)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'foto' => 'image|mimes:jpg,jpeg,png',
            'jabatan' => 'required',
            'status' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $newName = '';

        if ($request->file('foto')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = 'struktur-' . now()->timestamp . '.' . $extension;
            $validateData['foto'] = $request->file('foto')->storeAs('struktur', $newName);
        } else {
            $validateData['foto'] = $request->oldImage;
        }

        Struktur::where('id', $struktur->id)
            ->update($validateData);

        return redirect('/admin-page/struktur')
            ->with('success', 'Sukses Update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Struktur $struktur)
    {
        if ($struktur->foto) {
            Storage::delete($struktur->foto);
        }

        Struktur::destroy($struktur->id);

        return redirect('/admin-page/struktur')
            ->with('success', 'Sukses Menghapus data.');
    }
}
