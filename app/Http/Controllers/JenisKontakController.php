<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\jenis_kontak;
use App\Models\kontak;
use App\Models\siswa;

class JenisKontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('master_kontak');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.TambahJenisKontak');
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
        $masage = [
            'required' => ':attribute harus diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maximal :max karakter',
            'numeric' => ':attribute harus diisi angka',
            'mimes' => ':attribute harus bertipe foto'
        ];

        $this->validate($request, [
            'jenis_kontak' => 'required'
        ], $masage);


        jenis_kontak::create([
            'jenis_kontak' => $request->jenis_kontak
        ]);

        Session::flash('success', "data berhasil ditambahkan!!");
        return redirect('/masterkontak');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // $kontak = siswa::find($id)->kontak()->get();
        // $kontak = siswa::find($id)->jenis_kontak()->get();
        // $kontak = kontak::find($id);
        $j_kontak = kontak::find($id);
        
        // $kontak = kontak::get();
        // return($j_kontak);
        return view('edit_jeniskontak', compact('j_kontak', 'jenis'));
        //
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
        $masage = [
            'required' => ':attribute harus diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maximal :max karakter',
            'numeric' => ':attribute harus diisi angka',
            'mimes' => ':attribute harus bertipe foto'
        ];

        $this->validate($request, [
            'jenis_kontak' => 'required'
        ], $masage);

            $jkontak = jenis_kontak::find($id);
            $jkontak->jenis_kontak = $request->jenis_kontak;

            $jkontak->save();
            Session::flash('success', "data berhasil diupdate!!");
            return redirect('masterkontak');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function hapus($id)
    {
        $siswa = jenis_kontak::find($id)->delete();
        Session::flash('success', "data berhasil dihapus!!");
        return redirect('/masterkontak');
        //
    }
}