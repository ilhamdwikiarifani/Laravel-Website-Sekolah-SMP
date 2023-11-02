<?php

namespace App\Http\Controllers;

use App\Exports\SiswaExport;
use App\Models\Siswa;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();
        $notip = Contact::latest()->paginate(3);
        $notifikasi = Contact::all();
        return view('admin-page.siswa.index', compact('siswa', 'notip', 'notifikasi'));
    }



    public function exportsiswa()
    {
        $date = date('d-M-Y');
        return Excel::download(new SiswaExport, 'Siswa-' . $date . '.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-page.siswa.create');
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
            'nisn' => 'required|numeric|unique:siswa',
            'nik' => 'required|numeric|unique:siswa',
            'jeniskelamin' => 'required',
            'tempat' => 'required',
            'tanggallahir' => 'required',
            'alamat' => 'required',
            'userbelajarid' => 'nullable',
            'passwordbelajarid' => 'nullable',
        ]);


        $newName = '';

        if ($request->file('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = 'siswa-' . now()->timestamp . '.' . $extension;
            $validateData['foto'] = $request->file('foto')->storeAs('siswa', $newName);
        }

        Siswa::create($validateData);

        return redirect('/admin-page/siswa')
            ->with('success', 'Sukses Menambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        $notip = Contact::latest()->paginate(3);
        $notifikasi = Contact::all();
        return view('admin-page.siswa.show', compact('siswa', 'notip', 'notifikasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        $notip = Contact::latest()->paginate(3);
        $notifikasi = Contact::all();
        return view('admin-page.siswa.edit', compact('siswa', 'notip', 'notifikasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'foto' => 'image|mimes:jpg,jpeg,png',
            'nisn' => 'required|numeric',
            'nik' => 'required|numeric',
            'jeniskelamin' => 'required',
            'tempat' => 'required',
            'tanggallahir' => 'required',
            'alamat' => 'required',
            'userbelajarid' => 'nullable',
            'passwordbelajarid' => 'nullable',
        ]);

        $newName = '';

        if ($request->file('foto')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = 'siswa-' . now()->timestamp . '.' . $extension;
            $validateData['foto'] = $request->file('foto')->storeAs('siswa', $newName);
        } else {
            $validateData['foto'] = $request->oldImage;
        }

        Siswa::where('id', $siswa->id)
            ->update($validateData);

        return redirect('/admin-page/siswa')
            ->with('success', 'Sukses Update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        if ($siswa->foto) {
            Storage::delete($siswa->foto);
        }

        Siswa::destroy($siswa->id);

        return redirect('/admin-page/siswa')
            ->with('success', 'Sukses Menghapus data.');
    }
}
