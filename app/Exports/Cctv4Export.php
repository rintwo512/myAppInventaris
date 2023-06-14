<?php

namespace App\Exports;

use App\Models\CctvMonitor4;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Cctv4Export implements \Maatwebsite\Excel\Concerns\FromView
{

    public function view(): View
    {
        return view('cctv.monitor4.export', [
            'dataExportCctv4' => CctvMonitor4::all()
        ]);
    }
}
