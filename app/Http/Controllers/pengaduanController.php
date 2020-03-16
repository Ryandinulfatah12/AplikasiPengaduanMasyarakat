<?php

namespace App\Http\Controllers;

use App\Pengaduan;
use App\Tanggapan;
use Illuminate\Http\Request;

class pengaduanController extends Controller
{
    public function index()
    {
    	$pengaduan = Pengaduan::join('masyarakat','masyarakat.id','pengaduan.masyarakat_id')
            ->select('pengaduan.*','masyarakat.fullname','masyarakat.nik')
            ->orderBy('pengaduan.updated_at','desc')
            ->paginate(10);
    	return view('petugas.pages.pengaduan.data-pengaduan', compact('pengaduan'));
    }
    public function tulis()
    {
    	return view('masyarakat.pengaduan');
    }
    public function postPengaduan(Request $req)
    {
    	$filename = rand(1,999).'_'.str_replace(' ', '', $req->foto->getClientOriginalName());

        $req->file('foto')->storeAs('/public/gambar', $filename);

    	$pengaduan = new Pengaduan;
    	$pengaduan->masyarakat_id = $req->masyarakat_id;
    	$pengaduan->foto = $filename;
    	$pengaduan->isi_laporan = $req->isi_laporan;
    	$pengaduan->status = $req->status;
    	if ($pengaduan->save()) {
            alert()->success('Pengaduan Anda Berhasil Dikirimkan.', 'Terkirim!')->persistent('Oke');
    		return redirect()->route('masyarakat.dashboard');
    	} else {
    		alert()->info('Harap Periksa lagi data Formulir anda.','Tidak Tersimpan!')->autoclose(4000);
    	}
    }

    public function entri()
    {
        $entri = Pengaduan::join('masyarakat','masyarakat.id','pengaduan.masyarakat_id')
            ->where('status','pending')
            ->select('pengaduan.*','fullname')
            ->orderBy('pengaduan.updated_at','desc')
            ->paginate(10);

        return view('petugas.pages.pengaduan.verifikasi',compact('entri'));
    }

    public function detail(Request $req)
    {
        $show = Pengaduan::join('masyarakat','masyarakat.id','pengaduan.masyarakat_id')
            ->where('pengaduan.id', $req->id)
            ->select('pengaduan.*','masyarakat.fullname','masyarakat.nik','masyarakat.telp')
            ->first();
        $show2 = Tanggapan::join('pengaduan','pengaduan.id','tanggapan.pengaduan_id')
            ->join('petugas','petugas.id','tanggapan.petugas_id')
            ->select('tanggapan.*','pengaduan.*','petugas.fullname')
            ->where('tanggapan.pengaduan_id', $req->id)
            ->get();

        return view('petugas.pages.pengaduan.detail', compact('show'),compact('show2'));
    }

    public function getEntri($id)
    {
        $entri = Pengaduan::where('id', $id)->first();
        return view('petugas.pages.pengaduan.tanggapan', compact('entri'));
    }
    public function tolakEntri($id)
    {
        $entri = Pengaduan::where('id',$id)->first();
        $entri->update(['status' => 'ditolak']);
        alert()->success('Pengaduan Berhasil Ditolak.', 'Berhasil!')->persistent('Oke');
         return redirect()->route('verifikasi');
    }

    public function tanggapanPost(Request $req)
    {
        try {
            $tanggapan = new Tanggapan;
            $tanggapan->pengaduan_id = $req->pengaduan_id;
            $tanggapan->petugas_id = $req->petugas_id;
            $tanggapan->isi_tanggapan = $req->isi_tanggapan;
            if ($tanggapan->save()) {
                return back()->with('info', 1);
            }

        } catch (Exception $e) {
            
        }
        
    }

    public function clearTanggapan($id)
    {
        $tanggapan = Pengaduan::where('id', $id)->first();
        $tanggapan->update(['status' => 'ditanggapi']);
        alert()->success('Pengaduan Berhasil Ditanggapi.', 'Berhasil!')->persistent('Oke');
         return redirect()->route('verifikasi');
    }

}
