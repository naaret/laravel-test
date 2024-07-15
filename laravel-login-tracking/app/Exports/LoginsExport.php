<?php

namespace App\Exports;

use App\Models\Login;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LoginsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Login::where('user_id', auth()->id())->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'User Id',
            'Login',
        ];
    }

    public function getTotalLogins()
    {
        return Login::where('user_id', auth()->id())->count();
    }
}
