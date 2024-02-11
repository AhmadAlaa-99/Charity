<?php

namespace App\Http\Controllers\Admin;


use App\Models\Governance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\umrah;
use App\Models\muamtari;


class MuamtariController extends Controller
{
    public function muamtaris()
    {
        $data = muamtari::where('status','pending')->paginate('6');
        $umras=umrah::where('status','متاحة')->get();
        return view('Dashboard.muamtaris.index', compact('data','umras'));
    }
    public function accept(Request $request,$id)
    {
        $data = muamtari::where('id',$id)->update([
            'umrah_id'=>$request->umrah_id,
            'status'=>'done',
        ]);
        return redirect()->back();
    }
    public function reject($id)
    {
        try {
            $muamtar = muamtari::findOrFail($id);
            $muamtar->delete();
            return redirect()->back()->with('success', 'تمت العملية بنجاح');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }
}
