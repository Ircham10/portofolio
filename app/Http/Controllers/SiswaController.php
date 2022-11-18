<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\Models\Siswa;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Siswa::all();
        return view('admin.mastersiswa',  compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createSiswa');      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi bang',
            'min' => ':attribute minimal :min  karakter bang',
            'max' => ':attribute maksimal :max karakter cakk!!',
            'numeric' => ':attribute kudu diisi bang',
            'mimes' => 'file :attribute harus bertipe jpg,png,jpng',
            'size'  => 'file yang di uploud maksimal :size',
            'digits_between' => 'minimal 6,maksimal 12 mas'
        ];

        $this->validate($request,[
            'nisn' => 'required|numeric|digits_between:6,12',
            'nama' => 'required|min:5|max:20',
            'jk' => 'required',
            'alamat' => 'required|min:5',
            'email' => 'required',
            'about' => 'required|max:50',
            'foto' => 'required|mimes:jpg,jpeg,gif,png'
        ],$messages);

        //
        $file = $request->file('foto');

        //rename + ambil nama file
        $nama_file = time()."_".$file->getClientOriginalName();

        //proses uploud
        $tujuan_uploud = './template/img';
        $file->move($tujuan_uploud,$nama_file);

        //proses Insert Database
        Siswa::create([
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'about' => $request->about,
            'foto' => $nama_file
        ]);

        return redirect('/mastersiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Siswa::find($id);
        return view('admin.showSiswa',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Siswa::find($id);
        return view('admin.editSiswa',compact('data'));
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
        $messages = [
            'required' => ':attribute harus diisi bang',
            'min' => ':attribute minimal :min  karakter bang',
            'max' => ':attribute maksimal :max karakter cakk!!',
            'numeric' => ':attribute kudu diisi bang',
            'mimes' => 'file :attribute harus bertipe jpg,png,jpng',
            'size'  => 'file yang di uploud maksimal :size',
            'digits_between' => 'minimal 6,maksimal 12 mas'
        ];

        $this->validate($request,[
            'nisn' => 'required|numeric|digits_between:6,12',
            'nama' => 'required|min:5|max:20',
            'jk' => 'required',
            'alamat' => 'required|min:5',
            'email' => 'required',
            'about' => 'required|max:50',
            'foto' => 'mimes:jpg,jpeg,gif,png'
        ],$messages);

        if($request->foto != ''){

        $siswa=Siswa::find($id);
        file::delete('./template/img'.$siswa->foto);

        $file = $request->file('foto');

        //rename + ambil nama file
        $nama_file = time()."_".$file->getClientOriginalName();

        //proses uploud
        $tujuan_uploud = './template/img';
        $file->move($tujuan_uploud,$nama_file);

        $siswa=Siswa::find($id);
        $siswa->nisn = $request->nisn;
        $siswa->nama = $request->nama;
        $siswa->jk = $request->jk;
        $siswa->alamat = $request->alamat;
        $siswa->email = $request->email;
        $siswa->about = $request->about;
        $siswa->foto = $nama_file;
        $siswa->save();
        return redirect ('mastersiswa');


        }else{
            $siswa=Siswa::find($id);
            $siswa->nisn = $request->nisn;
            $siswa->nama = $request->nama;
            $siswa->jk = $request->jk;
            $siswa->alamat = $request->alamat;
            $siswa->email = $request->email;
            $siswa->about = $request->about;
            $siswa->save();
            return redirect ('mastersiswa');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function hapus($id)
    {
        $data=Siswa::find($id)->delete();
        return redirect('mastersiswa');
    }
}
