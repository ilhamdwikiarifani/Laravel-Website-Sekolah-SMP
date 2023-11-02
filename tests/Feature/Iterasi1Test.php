<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class Iterasi1Test extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_landingpageBeranda()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_landingpageProfil()
    {
        $response = $this->get('/visimisi');

        $response = $this->get('/struktursekolah');

        $response->assertStatus(200);
    }

    // public function test_landingpageStrukutursekolah()
    // {
    //     $response = $this->get('/struktursekolah');

    //     $response->assertStatus(200);
    // }

    public function test_landingpageBerita()
    {
        $response = $this->get('/berita');

        $response->assertStatus(200);
    }

    public function test_landingpageGaleri()
    {
        $response = $this->get('/galleri');

        $response->assertStatus(200);
    }

    public function test_landingpageContact()
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
    }

    public function test_LoginPage()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_DashboardBeranda()
    {

        $user = User::first();

        $this->actingAs($user);

        $response = $this->get('/admin');

        $response->assertStatus(200);
    }

    // public function test_DashboardKatergori()
    // {

    //     $user = User::first();

    //     $this->actingAs($user);

    //     $response = $this->get('/admin-page/kategori');

    //     $response->assertStatus(200);
    // }

    public function test_DashboardBerita()
    {

        $user = User::first();

        $this->actingAs($user);

        $response = $this->get('/admin-page/berita');

        $response->assertStatus(200);
    }

    // public function test_DashboardTautan()
    // {

    //     $user = User::first();

    //     $this->actingAs($user);

    //     $response = $this->get('/admin-page/tautan');

    //     $response->assertStatus(200);
    // }

    // public function test_DashboardDocument()
    // {

    //     $user = User::first();

    //     $this->actingAs($user);

    //     $response = $this->get('/admin-page/document');

    //     $response->assertStatus(200);
    // }


    public function test_DashboardStukrur()
    {

        $user = User::first();

        $this->actingAs($user);

        $response = $this->get('/admin-page/struktur');

        $response->assertStatus(200);
    }


    public function test_DashboardSiswa()
    {

        $user = User::first();

        $this->actingAs($user);

        $response = $this->get('/admin-page/siswa');

        $response->assertStatus(200);
    }

    public function test_DashboardGalery()
    {

        $user = User::first();

        $this->actingAs($user);

        $response = $this->get('/admin-page/galeri');

        $response->assertStatus(200);
    }


    public function test_DashboardUsers()
    {

        $user = User::first();

        $this->actingAs($user);

        $response = $this->get('/admin-page/manage-user');

        $response->assertStatus(200);
    }

    public function test_DashboardPesan()
    {

        $user = User::first();

        $this->actingAs($user);

        $response = $this->get('/admin-page/notifikasi');

        $response->assertStatus(200);
    }





    // public function testDatabase()
    // {
    //     // Make call to application...

    //     $this->assertDatabaseHas('users', [
    //         'email' => 'admin@gmail.com'
    //     ]);
    // }
}
