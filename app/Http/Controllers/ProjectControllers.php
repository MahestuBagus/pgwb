<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\siswa;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class ProjectControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = siswa::paginate(5);
        return view('admin.MasterProject', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create($id)
    {
        //
    }
    public function tambah($id_siswa)
    {
        
        $siswa = siswa::find($id_siswa);
        return view('admin.TambahProject', compact('siswa'));
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
        ];
        $this->validate($request, [
            'nama_project' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required'
        ], $massage);

        project::create([
            'id_siswa' => $request->id_siswa,
            'nama_project' => $request->nama_project,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
        ]);
        // project::create($validateData);
        Session::flash('success', "Project Berhasil Ditambah");
        return redirect('/masterproject');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $project = siswa::find($id)->project()->get();
        return view('admin.ShowProject', compact('project'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $idnya = siswa::find($id);
        $siswa = project::find($id);
        // return $siswa;
        return view('admin.EditProject', compact('siswa', 'idnya'));
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
            'required' => ':attribute diisi dengan nama',
        ];
        $this->validate($request, [
            'nama_project' => 'required|min:7|max:30',
            'deskripsi' => 'required|min:10',
            'tanggal' => 'required'
        ], $massage);

        $project = project::find($id);
        $project->nama_project = $request->nama_project;
        $project->deskripsi = $request->deskripsi;
        $project->tanggal = $request->tanggal;

        $project->save();
        // project::create($validateData);
        Session::flash('success', "Project Berhasil Diupdate");
        return redirect('/masterproject');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        $siswa = project::find($id)->delete();
        Session::flash('success', 'Data Berhasil Dihapus');
        return redirect('masterproject');
    }
}
