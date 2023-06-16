<?php

namespace App\Http\Controllers;


use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if(strlen($katakunci)){
            $data = Siswa::where('id', 'like', "%$katakunci%")
            ->orWhere('nama', 'like', "%$katakunci%")
            ->orWhere('alamat', 'like', "%$katakunci%")
            ->paginate($jumlahbaris);
        }else{
            $data = Siswa::orderBy('id', 'desc')->paginate($jumlahbaris);

        }
        
        return view('siswa.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id'=>'required|numeric|unique:siswa,id',
            'nama'=>'required',
            'alamat'=>'required',
        ],[
            'id.required'=>'ID wajib diisi',
            'id.numeric'=>'ID wajib dalam angka',
            'id.unique'=>'ID yang diisikan sudah ada dalam database',
            'nama.required'=>'Nama wajib diisi',
            'alamat.required'=>'Alamat wajib diisi',
        ]);
        $data = [
            'id' =>$request->id,
            'nama' =>$request->nama,
            'alamat' =>$request->alamat,

        ];
        Siswa::create($data);
        return redirect()->to('siswa')->with('success', 'Berhasil menambahkan data');

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
        $siswa = Siswa::where('id', $id)->first();
        return view('siswa.edit')->with('siswa', $siswa);
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
        $request->validate(
            [
            'nama'=>'required',
            'alamat'=>'required',
            ],
            [
            'nama.required'=>'Nama wajib diisi',
            'alamat.required'=>'Alamat wajib diisi',
            ]
        );
        
        $data = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ];

        Siswa::where('id', $id)->update($data);
        return redirect()->to('siswa')->with('success', 'Berhasil melakukan update data');      
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Siswa::where('id',$id)->delete();
        return redirect()->to('siswa')->with('success', 'Berhasil melakukan delete data');

    }
}
