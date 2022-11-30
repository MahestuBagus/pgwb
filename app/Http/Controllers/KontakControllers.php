<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Models\siswa;
use App\Models\project;
use App\Models\kontak;
use App\Models\jenis_kontak;

class KontakControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = siswa::get();
        $jenis = jenis_kontak::all();
        return view('admin.MasterKontak', compact('data', 'jenis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $siswa = siswa::find($id);
        $j_kontak = jenis_kontak::all();
        return view('admin.TambahKontak', compact('siswa', 'j_kontak'));
    }

    public function tambahkontak()
    {
        return view('tambahjeniskontak');
    }

    public function tambah($id)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $masage = [
            'required' => ':attribute harus diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maximal :max karakter',
            'numeric' => ':attribute harus diisi angka',
            'mimes' => ':attribute harus bertipe foto'
        ];

        $this->validate($request, [
            // 'deskripsi' => 'required|min:10'
        ], $masage);

        kontak::create([
            'siswa_id' => $request->id_siswa,
            'jenis_kontak_id' => $request->jenis_kontak,
            'deskripsi' => $request->deskripsi
        ]);

        Session::flash('success', "Kontak berhasil ditambahkan!!");
        return redirect('/masterkontak');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kontak = siswa::find($id)->kontak()->get();
        return view('admin.ShowKontak', compact('kontak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kontak = kontak::find($id);
        $siswa = siswa::find($id);
        $j_kontak = jenis_kontak::all();
        return view('admin.EditKontak', compact('kontak', 'siswa', 'j_kontak'));
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
        // return $request;
        $kontak = kontak::find($id);
        $kontak->siswa_id = $request->siswa_id;
        $kontak->jenis_kontak_id = $request->jenis_kontak;
        $kontak->deskripsi = $request->deskripsi;
        $kontak->save();
        Session::flash('update', 'Selamat!!! Kontak Anda Berhasil Diupdate');
        return redirect('/masterkontak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $kontak=kontak::find($id)->delete();
    //     Session::flash('success', 'Data Berhasil Dihapus');
    //     return redirect('/masterkontak');
    // }

    public function hapus($id)
    {
        $siswa = kontak::find($id)->delete();
        Session::flash('success', 'Data Berhasil Dihapus');
        return redirect('masterkontak');
    }
}
