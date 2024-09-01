<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
     * Mengembalikan koleksi data pengguna.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::all();
    }
}
