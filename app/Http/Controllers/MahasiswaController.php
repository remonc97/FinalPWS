<?php

namespace App\Http\Controllers;

use App\Http\Models\Mahasiswa;
use App\Http\Transformers\MahasiswaTransformer;
use Illuminate\Http\Request;
use Mockery\Exception;
use Dingo\Api\Routing\Helpers;

class MahasiswaController extends Controller
{
    use Helpers;

    public function showAll(){
        $Mahasiswas = Mahasiswa::all();

        if($Mahasiswas){
            return $this->response->collection($Mahasiswas,new MahasiswaTransformer);
        }else{
            $this->response->errorNotFound('data tidak ditemukan');
        }

    }
    public function show($id){
        try{
            $Mahasiswas = Mahasiswa::find($id);
        }catch (Exception $e){
            $this->response->error($e,500);
        }

        if($Mahasiswas){
            return $this->response->item($Mahasiswas,new MahasiswaTransformer);
        }else{
            $this->response->errorNotFound('data tidak ditemukan');
        }

    }
    public function store(Request $request){
        $data = $request->only([
            'nim','nama','fakultas',
            'peminatan','jurusan','angkatan'
        ]);

        $Mahasiswas = new Mahasiswa([
            'nim' => $data['nim'],
            'nama' => $data['nama'],
            'fakultas' => $data['fakultas'],
            'jurusan' => $data['jurusan'],
            'peminatan' => $data['peminatan'],
            'angkatan' => $data['angkatan']
            
        ]);

        try{
            $Mahasiswas->save();
        }catch (Exception $e){
            $this->response->error($e,500);
        }

        $this->response->created();

        $this->response->error('data berhasil diinsert',200);

    }
    public function update($id,Request $request){
        try{
            $Mahasiswas = Mahasiswa::find($id);
        }catch (Exception $e){
            $this->response->error($e,500);
        }

        $data = $request->only([
            'nim','nama','fakultas',
            'peminatan','jurusan','angkatan'
        ]);

        $Mahasiswas->fill([
            'nim' => $data['nim'],
            'nama' => $data['nama'],
            'fakultas' => $data['fakultas'],
            'jurusan' => $data['jurusan'],
            'peminatan' => $data['peminatan'],
            'angkatan' => $data['angkatan']
            
        ]);

        try{
            $Mahasiswas->update();
        }catch (Exception $e){
            $this->response->error($e,500);
        }
        $this->response->error('data berhasil diubah',200);

    }
    public function destroy($id){
        try{
            $Mahasiswas = Mahasiswa::find($id);
        }catch (Exception $e){
            $this->response->error($e,500);
        }

        try{
            $Mahasiswas->delete();
        }catch (Exception $e){
            $this->response->error($e,500);
        }
        $this->response->noContent();
        $this->response->error('data berhasil dihapus',200);
    }
}
