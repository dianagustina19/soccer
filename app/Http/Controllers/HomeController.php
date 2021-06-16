<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Tim;
use DB;


class HomeController extends Controller
{
    //TIM
    public function index()
    {
        return view('index');
    }

    public function indextim()
    {
        $tim = Tim::all();

        return view('tim.tim',compact('tim'));
    }

    public function chart()
    {
      $result = DB::table("tim")
      ->select("nama_tim", DB::raw("COUNT(*) as total"))
      ->join('pemain_tim','pemain_tim.tim_id','=','tim.id')
      ->groupBy("tim_id")
      ->get();

      return response()->json($result);
    }

    public function timcreate()
    {
        return view('tim.timcreate');
    }

    public function timcreatePost(Request $request)
    {
        $nama_tim = $request->nama_tim;
        $logo_tim = $request->logo_tim;
        $nama_file = time()."_".$logo_tim->getClientOriginalName();
		$tujuan_upload = 'data_foto';
		$logo_tim->move($tujuan_upload,$nama_file);
        $tahun_berdiri = $request->tahun_berdiri;
        $alamat = $request->alamat;
        $kota = $request->kota;
        $tanggal = $request->tanggal;
        $status = $request->status;

        $id = Tim::insertGetId([
            'nama_tim' => $nama_tim,
            'logo_tim' => $nama_file,
            'tahun_berdiri' => $tahun_berdiri,
            'alamat' => $alamat,
            'kota' => $kota,
            'tanggal' => $tanggal,
            'status' => $status
        ]);

        $destinationPath = 'data_foto';
        $foto_pemain = array();

        if($files=$request->file('foto_pemain')){
            foreach($files as $file){
                $filename=$file->getClientOriginalName();
                $file->move($destinationPath, $filename);
                $foto_pemain[]=$filename;
            }
        }
      
        $nama_pemain = $request->nama_pemain;
        $nomor_punggung = $request->nomor_punggung;
        $product = array();
        $count = count($nama_pemain);
        for($i = 0; $i < $count; $i++){ 
            $product[]  = array(
                'tim_id' => $id,
                'nama_pemain'=> $nama_pemain[$i],
                'foto_pemain' => $foto_pemain[$i],
                'nomor_punggung' => $nomor_punggung[$i] );
        }

        DB::table('pemain_tim')->insert($product);
    
        return redirect('tim');
    }
    
    public function edittim($id)
    {
        $tim = Tim::where('id',$id)->first();

        return view('tim.edittim',compact('tim'));
    }

    public function timupdate(Request $request)
    {
        $id = $request->id;
        $nama_tim = $request->nama_tim;
        $logo_tim_baru = $request->logo_tim_baru;
        $logo_tim_lama = $request->logo_tim_lama;
        $tahun_berdiri = $request->tahun_berdiri;
        $alamat = $request->alamat;
        $kota = $request->kota;
        $tanggal = $request->tanggal;
        $status = $request->status;

        if($logo_tim_baru != '')
        {
            $nama_file = time()."_".$logo_tim_baru->getClientOriginalName();
            $tujuan_upload = 'data_foto';
            $logo_tim_baru->move($tujuan_upload,$nama_file);
        }else
        {
            $nama_file = $logo_tim_lama;
        }

        Tim::where('id',$id)
        ->update([
            'nama_tim' => $nama_tim,
            'logo_tim' => $nama_file,
            'tahun_berdiri' => $tahun_berdiri,
            'alamat' => $alamat,
            'kota' => $kota,
            'tanggal' => $tanggal,
            'status' => $status
        ]);
        
        return redirect()->to('tim');
    }

    public function detail($id)
    {
        $tim = Tim::leftjoin('pemain_tim','pemain_tim.tim_id','tim.id')
        ->where('tim.id',$id)
        ->first();

        $pemain = Tim::leftjoin('pemain_tim','pemain_tim.tim_id','tim.id')
        ->where('tim.id',$id)
        ->get();

        return view('tim.detail',compact('tim','pemain'));
    }

    public function deletetim($id)
    {
        Tim::where('id',$id)->delete();
        DB::table('pemain_tim')->where('tim_id',$id)->delete();
            
        return redirect('tim');
    }
}
