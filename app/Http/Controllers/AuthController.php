<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Berita;
use App\Models\Document;
use App\Models\Contact;
use App\Models\Role;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('landing-page.login');
    }


    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin');
        }

        Session::flash('status', 'fail');
        Session::flash('message', 'Login Wrong');

        return redirect('/login');

        // return response()->json('berhasil login');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $role = Role::all();
        $notip = Contact::latest()->paginate(3);
        $notifikasi = Contact::all();
        return view('admin-page.user.index', compact('user', 'notip', 'notifikasi', 'role'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-page.user.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'role_id' => 'required',
            'name' => 'required|max:255|min:3',
            'email' => 'required|email',
            'password' => 'required|min:4|max:255'
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        return redirect('/admin-page/manage-user')->with('success', 'Akun Berhasil Dibuat,');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // $notip = Contact::latest()->paginate(3);
        // $notifikasi = Contact::all();
        // return view('admin-page.kategori.show', compact('kategori', 'notip', 'notifikasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $notip = Contact::latest()->paginate(3);
        $notifikasi = Contact::all();
        return view('admin-page.user.edit', compact('user', 'notip', 'notifikasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password == null && $request->password2 == null) {
            $user->password = $user->password;
        } else if ($request->password != $request->password2) {
            return redirect()->back()->with('success', 'Konfirmasi Password tidak sama');
        } else {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        return redirect('/admin-page/manage-user')->with('success', 'Data Berhasil Diperbarui');
    }


    public function updatePassword(Request $request, User $user)
    {
        return $request;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Request $request)
    {
        User::where('id', $request->idx)->delete();

        return redirect('/admin-page/manage-user')
            ->with('success', 'Sukses Menghapus data.');
    }
}
