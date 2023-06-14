<?php

namespace App\Exports;

use App\Models\CctvMonitor3;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Cctv3Export implements \Maatwebsite\Excel\Concerns\FromView
{

    public function view(): View
    {
        return view('cctv.monitor3.export', [
            'dataExportCctv3' => CctvMonitor3::all()
        ]);
    }
}
