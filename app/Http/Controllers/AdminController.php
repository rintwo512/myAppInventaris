<?php

namespace App\Http\Controllers;

use App\Models\Ac;
use App\Models\User;
use App\Models\Session;
use App\Models\CctvMonitor1;
use App\Models\CctvMonitor2;
use App\Models\CctvMonitor3;
use App\Models\CctvMonitor4;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('dataUsers.index', [
            'title' => 'Data Users',
            'dataUsers' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'nik' => 'required|numeric|unique:users',
            'password' => 'required|min:3'
        ]);

        if ($request->isActive > 0) {

            $validateData['is_active'] = $request->isActive;
        } else {

            $validateData['is_active'] = 0;
        }
        if ($request->role > 0) {
            $validateData['role'] = $request->role;
        } else {
            $validateData['role'] = 0;
        }


        $validateData['image'] = 'default.png';
        $validateData['password'] = bcrypt($request->password);

        User::create($validateData);
        return redirect('dashboard/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = User::find($id);
        $urlSeg = request()->segment(3);
        if ($urlSeg != 1) {
            $getDataUpdate = Ac::where('user_updated', $user->name)->get();
            $getDataUpdateCctv1 = CctvMonitor1::where('user_updated', $user->name)->get();
            $getDataUpdateCctv2 = CctvMonitor2::where('user_updated', $user->name)->get();
            $getDataUpdateCctv3 = CctvMonitor3::where('user_updated', $user->name)->get();
            $getDataUpdateCctv4 = CctvMonitor4::where('user_updated', $user->name)->get();

            return view('dataUsers.dataUserCreate', [
                'title' => 'User Activity',
                'dataCreates' => $getDataUpdate,
                'dataCctv1' => $getDataUpdateCctv1,
                'dataCctv2' => $getDataUpdateCctv2,
                'dataCctv3' => $getDataUpdateCctv3,
                'dataCctv4' => $getDataUpdateCctv4,
                'user' => $user
            ]);
        } else {
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::find($id);

        dd($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if ($request->isActive > 0 || $request->role > 0) {
            $data['is_active'] = $request->isActive;
            $data['role'] = $request->role;
        } else {
            $data['is_active'] = 0;
            $data['role'] = 0;
        }

        if (Session::where('user_id', $id)->count() == 0) {
            Session::create([
                'user_id' => $id
            ]);
        }

        User::where('id', $id)->update($data);
        return redirect('dashboard/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        Session::where('user_id', $id)->delete();

        return response()->json(['success', 'User has been delete!']);
    }
    public function errorPage()
    {
        return view('errorPage', [
            'title' => 'Page Not Found!'
        ]);
    }
}
