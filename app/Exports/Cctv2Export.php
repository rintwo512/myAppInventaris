<?php

namespace App\Exports;

use App\Models\CctvMonitor2;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Cctv2Export implements \Maatwebsite\Excel\Concerns\FromView
{

    public function view(): View
    {
        return view('cctv.monitor2.export', [
            'dataExportCctv2' => CctvMonitor2::all()
        ]);
    }
}
