<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;
use App\Models\Desa;
use App\Models\Dusun;

class SensusController extends Controller
{
    public function warga()
    {
        $warga = Warga::paginate(10);

        return view('warga.warga', ['warga' => $warga]);
    }

    public function cariWarga(Request $request)
    {
        $cari = $request->cari;
        $warga = Warga::where('warga_nama', 'like', "%".$cari."%")->paginate(10);

        return view('warga.warga', ['warga' => $warga]);
    }

    public function tambahWarga()
    {
        $desa = Desa::pluck('desa_nama', 'desa_id');

        return view('warga.tambah_warga', compact('desa'));
    }

    public function tambahWargaAksi(Request $request)
    {
        $messages = [
            'nama.required'         => 'Nama wajib diisi',
            'nama.min'              => 'Nama minimal 4 karakter',
            'nama.max'              => 'Nama maksimal 30 karakter',
            'ktp.required'          => 'No. KTP wajib diisi',
            'jk.required'           => 'Jenis kelamin wajib dipilih',
            'desa.required'         => 'Desa wajib dipilih',
            'dusun.required'        => 'Dusun wajib dipilih',
            'rt.required'           => 'RT wajib diisi',
            'rw.required'           => 'RW wajib diisi',
            'status.required'       => 'Status wajib dipilih',
            'pendidikan.required'   => 'Pendidikan terakhir wajib diisi',
            'agama.required'        => 'Agama wajib diisi',
        ];

        $request->validate([
            'nama'          => 'required|min:4|max:30',
            'ktp'           => 'required',
            'jk'            => 'required',
            'desa'          => 'required',
            'dusun'         => 'required',
            'rt'            => 'required',
            'rw'            => 'required',
            'status'        => 'required',
            'pendidikan'    => 'required',
            'agama'         => 'required',
        ], $messages);

        $warga = new Warga;
        $warga->warga_nama = $request->nama;
        $warga->warga_ktp = $request->ktp;
        $warga->warga_jk = $request->jk;
        $warga->warga_desa = $request->desa;
        $warga->warga_dusun = $request->dusun;
        $warga->warga_rt = $request->rt;
        $warga->warga_rw = $request->rw;
        $warga->warga_status = $request->status;
        $warga->warga_pendidikan = $request->pendidikan;
        $warga->warga_agama = $request->agama;
        $simpan = $warga->save();

        if ($simpan)
        {
            return redirect('warga')->with('success', 'Berhasil menambah warga');
        }
        else
        {
            return back()->with('error', 'Gagal menambah warga, silahkan coba kembali');
        }
    }

    public function editWarga($id)
    {
        $warga = Warga::find($id);
        $desa = Desa::all();
        $dusun = Dusun::all();

        return view('warga.edit_warga', ['warga' => $warga, 'desa' => $desa, 'dusun' => $dusun]);
    }

    public function editWargaAksi(Request $request, $id)
    {
        $messages = [
            'nama.required'         => 'Nama wajib diisi',
            'nama.min'              => 'Nama minimal 4 karakter',
            'nama.max'              => 'Nama maksimal 30 karakter',
            'ktp.required'          => 'No. KTP wajib diisi',
            'jk.required'           => 'Jenis kelamin wajib dipilih',
            'desa.required'         => 'Desa wajib dipilih',
            'dusun.required'        => 'Dusun wajib dipilih',
            'rt.required'           => 'RT wajib diisi',
            'rw.required'           => 'RW wajib diisi',
            'status.required'       => 'Status wajib dipilih',
            'pendidikan.required'   => 'Pendidikan terakhir wajib diisi',
            'agama.required'        => 'Agama wajib diisi',
        ];

        $request->validate([
            'nama'          => 'required|min:4|max:30',
            'ktp'           => 'required',
            'jk'            => 'required',
            'desa'          => 'required',
            'dusun'         => 'required',
            'rt'            => 'required',
            'rw'            => 'required',
            'status'        => 'required',
            'pendidikan'    => 'required',
            'agama'         => 'required',
        ], $messages);

        $warga = Warga::find($id);
        $warga->warga_nama = $request->nama;
        $warga->warga_ktp = $request->ktp;
        $warga->warga_jk = $request->jk;
        $warga->warga_desa = $request->desa;
        $warga->warga_dusun = $request->dusun;
        $warga->warga_rt = $request->rt;
        $warga->warga_rw = $request->rw;
        $warga->warga_status = $request->status;
        $warga->warga_pendidikan = $request->pendidikan;
        $warga->warga_agama = $request->agama;
        $simpan = $warga->save();

        if ($simpan)
        {
            return redirect('warga')->with('success', 'Berhasil mengupdate data warga');
        }
        else
        {
            return back()->with('error', 'Gagal mengupdate data warga, silahkan coba kembali');
        }
    }

    public function hapusWarga($id)
    {
        $warga = Warga::find($id);
        $warga->delete();

        return back()->with('success', 'Berhasil menghapus warga');
    }

    public function desa()
    {
        $desa = Desa::paginate(10);

        return view('desa.desa', compact('desa'));
    }

    public function cariDesa(Request $request)
    {
        $cari = $request->cari;
        $desa = Desa::where('desa_nama', 'like', "%".$cari."%")->paginate(10);

        return view('desa.desa', ['desa' => $desa]);
    }

    public function tambahDesa()
    {
        return view('desa.tambah_desa');
    }

    public function tambahDesaAksi(Request $request)
    {
        $messages = [
            'desa.required' => 'Desa wajib diisi',
            'desa.min'      => 'Desa minimal 4 karakter',
            'desa.max'      => 'Desa maksimal 20 karakter',
        ];
        
        $request->validate([
            'desa'  => 'required|min:4|max:20',
        ], $messages);

        $desa = new Desa;
        $desa->desa_nama = $request->desa;
        $simpan = $desa->save();

        if ($simpan)
        {
            return redirect('desa')->with('success', 'Berhasil menambah desa');
        }
        else
        {
            return back()->with('error', 'Gagal menambah desa, silahkan coba kembali');
        }
    }

    public function editDesa($id)
    {
        $desa = Desa::find($id);

        return view('desa.edit_desa', ['desa' => $desa]);
    }

    public function editDesaAksi($id, Request $request)
    {
        $messages = [
            'desa.required' => 'Desa wajib diisi',
            'desa.min'      => 'Desa minimal 4 karakter',
            'desa.max'      => 'Desa maksimal 20 karakter',
        ];
        
        $request->validate([
            'desa'  => 'required|min:4|max:20',
        ], $messages);

        $desa = Desa::find($id);
        $desa->desa_nama = $request->desa;
        $simpan = $desa->save();

        if ($simpan)
        {
            return redirect('desa')->with('success', 'Berhasil mengupdate data desa');
        }
        else
        {
            return back()->with('error', 'Gagal mengupdate data desa, silahkan coba kembali');
        }
    }

    public function hapusDesa($id)
    {
        $desa = Desa::find($id);
        $desa->delete();

        return route()->route('desa')->with('success', 'Desa berhasil dihapus');
    }

    public function dusun()
    {
        $dusun = Dusun::paginate(10);

        return view('dusun.dusun', compact('dusun'));
    }

    public function cariDusun(Request $request)
    {
        $cari = $request->cari;
        $dusun = Dusun::where('dusun_nama', 'like', "%".$cari."%")->paginate(10);

        return view('dusun.dusun', ['dusun' => $dusun]);
    }

    public function tambahDusun()
    {
        $desa = Desa::all();

        return view('dusun.tambah_dusun', ['desa' => $desa]);
    }

    public function tambahDusunAksi(Request $request)
    {
        $messages = [
            'desa.required'     => 'Desa wajib dipilih',
            'dusun.required'    => 'Dusun wajib diisi',
            'dusun.min'         => 'Dusun minimal 4 karakter',
            'dusun.max'         => 'Dusun maksimal 20 karakter',
        ];

        $request->validate([
            'desa'  => 'required',
            'dusun' => 'required|min:4|max:20',
        ], $messages);

        $dusun = new Dusun;
        $dusun->dusun_desa = $request->desa;
        $dusun->dusun_nama = $request->dusun;
        $simpan = $dusun->save();

        if ($simpan)
        {
            return redirect('dusun')->with('success', 'Berhasil menambah dusun');
        }
        else
        {
            return back()->with('error', 'Gagal menambah dusun, silahkan coba kembali');
        }
    }

    public function editDusun($id)
    {
        $desa = Desa::all();
        $dusun = Dusun::find($id);

        return view('dusun.edit_dusun', ['desa' => $desa, 'dusun' => $dusun]);
    }

    public function editDusunAksi(Request $request, $id)
    {
        $messages = [
            'desa.required'     => 'Desa wajib dipilih',
            'dusun.required'    => 'Dusun wajib diisi',
            'dusun.min'         => 'Dusun minimal 4 karakter',
            'dusun.max'         => 'Dusun maksimal 20 karakter',
        ];

        $request->validate([
            'desa'  => 'required',
            'dusun' => 'required|min:4|max:20',
        ], $messages);

        $dusun = Dusun::find($id);
        $dusun->dusun_desa = $request->desa;
        $dusun->dusun_nama = $request->dusun;
        $simpan = $dusun->save();

        if ($simpan)
        {
            return redirect('dusun')->with('success', 'Berhasil mengupdate dusun');
        }
        else
        {
            return back()->with('error', 'Gagal mengupdate dusun, silahkan coba kembali');
        }
    }

    public function hapusDusun($id)
    {
        $dusun = Dusun::find($id);
        $dusun->delete();

        return redirect('dusun')->with('success', 'Dusun berhasil dihapus');
    }

    public function ajaxDusun($id)
    {
        $dusun = Dusun::where('dusun_desa', $id)->pluck('dusun_nama', 'dusun_id');

        return json_encode($dusun);
    }
}
