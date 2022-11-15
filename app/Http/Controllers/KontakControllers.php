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
        $data = siswa::Paginate(5);
        $jenis = jenis_kontak::all();
        return view ('admin.MasterKontak', compact('data', 'jenis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function tambahkontak()
    {
        return view ('tambahjeniskontak');
    }

    public function tambah($id)
    {
        $siswa=siswa::find($id);
        $jenis=jenis_kontak::all();
        return view ('admin.TambahKontak', compact('siswa', 'jenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => ':attribute Harus Di isi!',
        ];
        $validateData = $request->validate([
            'jenis_kontak_id' => 'required',
            'deskripsi' => 'required',
        ], $message);

        kontak::create([
            'siswa_id' => $request->siswa_id,
            'jenis_kontak_id' => $request->jenis_kontak_id,
            'deskripsi' => $request->deskripsi,
        ]);
            
        Session::flash('benar', 'Selamat!!! Data Berhasil Ditambahkan');
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
        $kontak=siswa::find($id)->kontak()->get();
        return view('showkontak', compact('kontak'));
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
        $jenis=jenis_kontak::all();
        return view('EditKontak', compact('kontak', 'siswa', 'jenis'));
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
        $kontak = kontak::find($id);
        $kontak->jenis_kontak = $request->jenis_kontak;
        $kontak->deskripsi = $request->deskripsi;
        $kontak->save();
        Session::flash('update', 'Selamat!!! Project Anda Berhasil Diupdate');
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
        return redirect('masterproject');
    }
}