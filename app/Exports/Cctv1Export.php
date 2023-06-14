<?php

namespace App\Exports;

use App\Models\CctvMonitor1;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Cctv1Export implements \Maatwebsite\Excel\Concerns\FromView
{

    public function view(): View
    {
        return view('cctv.monitor1.export', [
            'dataExportCctv1' => CctvMonitor1::all()
        ]);
    }
}
