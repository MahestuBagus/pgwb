<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\siswa;
use Illuminate\Support\Facades\File;
use Symfony\Contracts\Service\Attribute\Required;

class SiswaControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = siswa::all();
        return view('admin.MasterSiswa', compact('data'));
        // return ($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.TambahSiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $massage = [
            'required' => ':attribute diisi dengan nama',
            'min' => ':attribute minimal:min karakter',
            'max' => ':attribute maksimal:max karakter',
            'numeric' => ':attribute harus diisi anggka',
            'mimes' => ':attribute harus bertipe jpg,png,jpeg '
        ];
        $this->validate($request, [
            'nama' => 'required|min:7|max:30',
            'nisn' => 'required|numeric',
            'alamat' => 'required',
            'jk' => 'required',
            'foto' => 'required|mimes:jpg,png,jpeg',
            'about' => 'required|min:10',
        ], $massage);

        $file = $request->file('foto');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_uploud = './template/img';
        $file->move($tujuan_uploud, $nama_file);

        Siswa::create([
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'alamat' => $request->alamat,
            'jk' => $request->jk,
            'foto' => $nama_file,
            'about' => $request->about,
        ]);
        Session::flash('success', 'Data Berhasil Di Simpan');
        return redirect('mastersiswa');
    }

    /**
     * Display the specified resource.
     *   
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = siswa::find($id);
        $kontaks = $siswa->kontak()->get();
        // return ($kontak);
        return view('admin.ShowSiswa', compact('siswa', 'kontaks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = siswa::find($id);
        return view('admin.EditSiswa', compact('siswa'));
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
        $massage = [
            'required' => ':attribute harus diisi Slurr ',
            'numeric' => ':attribute kudu diisi angka Slur!!!',
            'min' => ':attribute minimal :min karakter ya Slurr',
            'mimes' => ':attribute harus bertipe jpg,jpeg,png',
            'max' => ':attribute maksimal :max Karakter Slurrr'
        ];
        // validasi form
        $this->validate($request, [
            'nisn' => 'required|numeric',
            'nama' => 'required|min:7|max:50',
            'alamat' => 'required',
            'jk' => 'required',
            'foto' => 'mimes:jpg,png,jpeg',
            'about' => 'required|'
        ], $massage);

        if ($request->foto != '') {
            //ganti foto

            //1. hapus foto lama
            $siswa = Siswa::find($id);
            File::delete('./template/img' . $siswa->foto);
            // 2.ambil informasi file foto
            $file = $request->file('foto');
            //rename
            $nama_file = time() . "_" . $file->getClientOriginalName();
            //proses upload
            $tujuan_upload = './template/img';
            $file->move($tujuan_upload, $nama_file);


            $siswa->nama = $request->nama;
            $siswa->nisn = $request->nisn;
            $siswa->jk = $request->jk;
            $siswa->alamat = $request->alamat;
            $siswa->foto = $nama_file;
            $siswa->about = $request->about;
            $siswa->jk = $request->jk;
            $siswa->save();
            Session::flash('success', 'Data Berhasil Diinput');
            return redirect('/mastersiswa');
        } else {
            $siswa = Siswa::find($id);
            $siswa->nama = $request->nama;
            $siswa->nisn = $request->nisn;
            $siswa->jk = $request->jk;
            $siswa->alamat = $request->alamat;
            $siswa->about = $request->about;
            $siswa->jk = $request->jk;
            $siswa->save();
            Session::flash('success', 'Data Berhasil Diinput');
            return redirect('/mastersiswa');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        Session::flash('success', 'Data Berhasil Dihapus');
        return redirect('/mastersiswa');
    }
}
