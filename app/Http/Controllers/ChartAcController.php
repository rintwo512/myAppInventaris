<?php

namespace App\Http\Controllers;

use App\Models\Ac;
use App\Models\User;
use App\Models\Chart;
use App\Models\CctvMonitor1;
use App\Models\CctvMonitor2;
use App\Models\CctvMonitor3;
use App\Models\CctvMonitor4;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ChartAcController extends Controller
{
    public function index(Request $request)
    {

        $kalTahun = DB::table('chartac')->select('tahun')->groupBy('tahun')->orderBy('tahun', 'DESC')->get()->count();
        $kal = intval(Chart::sum('total'));

        $countCctv1 = CctvMonitor1::all()->count();
        $countCctv2 = CctvMonitor2::all()->count();
        $countCctv3 = CctvMonitor3::all()->count();
        $countCctv4 = CctvMonitor4::all()->count();
        $countAll = $countCctv1 + $countCctv2 + $countCctv3 + $countCctv4;

        $countCctv1Rusak = CctvMonitor1::where('status', 'Rusak')->count();
        $countCctv2Rusak = CctvMonitor2::where('status', 'Rusak')->count();
        $countCctv3Rusak = CctvMonitor3::where('status', 'Rusak')->count();
        $countCctv4Rusak = CctvMonitor4::where('status', 'Rusak')->count();
        $countCctvAllRusak = $countCctv1Rusak + $countCctv2Rusak + $countCctv3Rusak + $countCctv4Rusak;

        $countTrashCctv1 = CctvMonitor1::onlyTrashed()->count();
        $countTrashCctv2 = CctvMonitor2::onlyTrashed()->count();
        $countTrashCctv3 = CctvMonitor3::onlyTrashed()->count();
        $countTrashCctv4 = CctvMonitor3::onlyTrashed()->count();
        $countTrashCctvAll = $countTrashCctv1 + $countTrashCctv2 + $countTrashCctv3 + $countTrashCctv4;

        $countAcRusak = Ac::where('status', 'Rusak')->count();


        $list_tahun = DB::table('chartac')
            ->select('tahun')
            ->groupBy('tahun')
            ->orderBy('tahun', 'DESC')
            ->get();


        return view('dashboard', [
            'title' => 'Dashboard',
            'countData' => Ac::count(),
            'countTrash' => Ac::onlyTrashed()->count(),
            'countUsers' => User::count(),
            'list_tahun' => $list_tahun,
            'kal' => $kal,
            'kalTahun' => $kalTahun,
            'countAcRusak' => $countAcRusak,
            'countAll' => $countAll,
            'countTrashCctvAll' => $countTrashCctvAll,
            'countCctvAllRusak' => $countCctvAllRusak
        ]);
    }

    public function getChart(Request $request)
    {
        $tahun = $request->tahun;
        $data = Chart::where('tahun', $tahun)
            ->orderBy('tahun', 'ASC')
            ->get()->toArray();
        foreach ($data as $d) {
            $output[] = array(
                'tahun' => $d['tahun'],
                'bulan' => $d['bulan'],
                'total' => $d['total']
            );
        }
        echo json_encode($output);
    }


    public function dataChart(Request $request)
    {

        $input = $request->updateTahun;
        $dataTotalUnit = Chart::where('tahun', $input)->sum('total');

        $dataTahun = Chart::where('tahun', $input)->get();

        $month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', ' August', 'September', 'October', 'November', 'December'];


        $listUpdateTahun = DB::table('chartac')
            ->select('tahun')
            ->groupBy('tahun')
            ->orderBy('tahun', 'DESC')
            ->get();
        return view('chartsAC.update', [
            'title' => 'Chart AC',
            'listUpdateTahun' => $listUpdateTahun,
            'dataChart' => $dataTahun,
            'month' => $month,
            'dataTotalUnit' => intval($dataTotalUnit)
        ]);
    }


    public function updateViewChartAc(Request $request)
    {
        $input = $request->updateTahun;

        $dataTahun = Chart::where('tahun', $input)->get();

        return view('chartsAC.update', [
            'dataChart' => $dataTahun
        ]);

        // return response()->json($dataTahun);
    }

    public function deleteDataChartAc($id)
    {
        Chart::where('id', $id)->delete();

        return response()->json(['success' => 'Ok']);
    }

    public function tambahDataChart(Request $request)
    {
        $rules = [
            'tahunChart' => 'required',
            'monthChart' => 'required',
            'totalChart' => 'required'
        ];

        $data = $request->validate($rules);
        $data = [
            'tahun' => $request->tahunChart,
            'bulan' => $request->monthChart,
            'total' => $request->totalChart
        ];

        Chart::create($data);

        return redirect('dashboard/charts')->with('success', 'Data has been Added!');
    }

    public function updateDataChart(Request $request)
    {
        $id = $request->idUpdateChart;

        $rules = [
            'tahunUpdateChart' => 'required',
            'monthUpdateChart' => 'required',
            'totalUpdateChart' => 'required'
        ];

        $data = $request->validate($rules);
        $data = [
            'tahun' => $request->tahunUpdateChart,
            'bulan' => $request->monthUpdateChart,
            'total' => $request->totalUpdateChart
        ];

        $setDB = Chart::where('id', $id)->update($data);

        if ($setDB > 0) {

            $one = Chart::all()->toArray();
            $dateNow = Carbon::now();
            $dateNowYear = Carbon::now()->format('Y');
            $pesan = '*Tanggal update* ' . '*' . $dateNow . '*' . "\n"
                . "*Data Maintenance AC bulanan*\n\nBulan " . $one[0]['bulan'] . " : " . $one[0]['total'] . " Unit\nBulan " . $one[1]['bulan'] . " : " . $one[1]['total'] . " Unit\n\n" . "*" . "Data tahun " . $dateNowYear . "*";

            $pesanEncode = urlencode($pesan);
            $response = Http::get('https://api.telegram.org/bot5372613320:AAHJNa6n0C68VZFWIDcRckIWSjP_UCLiGBU/sendMessage?parse_mode=markdown&chat_id=-532291265&text=' . $pesanEncode);
        }
        return redirect('dashboard/charts')->with('success', 'Data has been updated!');
    }
}
