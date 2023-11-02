<?php

namespace App\Exports;

use App\Models\Struktur;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class StrukturExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $strukturs = DB::table('struktur')
            ->select('struktur.nama', 'struktur.jabatan', 'struktur.status', 'struktur.deskripsi',)
            ->get();

        return $strukturs;
    }

    public function headings(): array
    {
        return ["NAMA", "JABATAN", "STATUS", "DESKRIPSI"];
    }
}
