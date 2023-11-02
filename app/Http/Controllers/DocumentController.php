<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Contact;
use App\Models\Tautan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $document = Document::all();
        $notifikasi = Contact::all();
        $notip = Contact::latest()->paginate(3);

        return view('admin-page.document.index', compact('document', 'notip', 'notifikasi'));
    }



    public function document(Document $document)
    {

        $document = Document::latest()->paginate(6);

        return view('landing-page.document', compact('document'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }

    public function tautan(Document $document)
    {

        $tautan = Tautan::latest()->paginate(6);

        return view('landing-page.tautan', compact('tautan'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-page.document.create');
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
            'file' => 'required|mimes:pdf,docx,doc,dotx,txt,xps,xlsx,xls,xlsb,xlt,ppt,pptx,mp4,wmv,xlsx',
            'waktu' => 'required',
            'deskripsi' => 'required',
        ]);


        $newName = '';

        if ($request->file('file')) {
            $newName = $request->file('file')->getClientOriginalName();
            $validateData['file'] = $request->file('file')->storeAs('document', $newName);
        }

        Document::create($validateData);

        return redirect('/admin-page/document')
            ->with('success', 'Sukses Menambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        $notip = Contact::latest()->paginate(3);
        $notifikasi = Contact::all();
        return view('admin-page.document.show', compact('document', 'notip', 'notifikasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        $notip = Contact::latest()->paginate(3);
        $notifikasi = Contact::all();
        return view('admin-page.document.edit', compact('document', 'notip', 'notifikasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'file' => 'file|mimes:pdf,docx,doc,dotx,txt,xps,xlsx,xls,xlsb,xlt,ppt,pptx,mp4,wmv',
            'waktu' => 'required',
            'deskripsi' => 'required',
        ]);

        $newName = '';

        if ($request->file('file')) {
            if ($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $newName = $request->file('file')->getClientOriginalName();
            $validateData['file'] = $request->file('file')->storeAs('document', $newName);
        } else {
            $validateData['file'] = $request->oldFile;
        }

        Document::where('id', $document->id)
            ->update($validateData);

        return redirect('/admin-page/document')
            ->with('success', 'Sukses Update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        if ($document->file) {
            Storage::delete($document->file);
        }

        Document::destroy($document->id);

        return redirect('/admin-page/document')
            ->with('success', 'Sukses Menghapus data.');
    }
}
