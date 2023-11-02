<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class SiswaExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $siswas = DB::table('siswa')
            ->select('siswa.nama', 'siswa.nisn', 'siswa.nik', 'siswa.jeniskelamin', 'siswa.tempat', 'siswa.tanggallahir', 'siswa.alamat', 'siswa.userbelajarid', 'siswa.passwordbelajarid',)
            ->get();

        return $siswas;
    }

    public function headings(): array
    {
        return ["NAMA", "NISN", "NIK", "JENIS KELAMIN", "TEMPAT LAHIR", "TANGGAL LAHIR", "ALAMAT", "USERNAME AKUN BELAJAR ID", "PASSWORD AKUN BELAJAR ID"];
    }
}
