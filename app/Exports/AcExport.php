<?php

namespace App\Exports;

use App\Models\Ac;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class AcExport implements \Maatwebsite\Excel\Concerns\FromView
{

    public function view(): View
    {
        return view('dataAC.export', [
            'dataExport' => Ac::all()
        ]);
    }
}


// FromCollection


/**
 * @return \Illuminate\Support\Collection
 */
    // public function collection()
    // {
    //     return Ac::all();
    // }