<?php

namespace App\Http\Controllers\Upload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        // validasi
        $this->validate($request, [
			'file' => 'required',
			'module' => 'required',
		]);

        // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
        $module = $request['module'];

        // nama file
		echo 'File Name: '.$file->getClientOriginalName();
		echo '<br>';

        // ekstensi file
		echo 'File Extension: '.$file->getClientOriginalExtension();
		echo '<br>';
 
      	// real path
		echo 'File Real Path: '.$file->getRealPath();
		echo '<br>';

         // ukuran file
		echo 'File Size: '.$file->getSize();
		echo '<br>';
 
      	// tipe mime
		echo 'File Mime Type: '.$file->getMimeType();
        echo '<br>';
 
      	// isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = $request['module'];

        // ubah name file
        $nama_file = time()."_".$file->getClientOriginalName();

        // upload file
		$url = $file->move($tujuan_upload,$nama_file);

       $validUrl = $module."/".$nama_file;

        $data = [
            "message" => "success",
            "status" => 200,
            "linkGambar" => $validUrl
        ];


        return response()->json($data, 200);

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
}
