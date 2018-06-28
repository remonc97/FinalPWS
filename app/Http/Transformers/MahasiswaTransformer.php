<?php

namespace App\Http\Transformers;
use League\Fractal\TransformerAbstract;
use App\Http\Models\Mahasiswa;

class MahasiswaTransformer extends TransformerAbstract
{
    public function transform(Mahasiswa $field){
        return [
            'id_mahasiswa' => $field->id_mahasiswa,
            'nim' => $field->nim,
            'nama' => $field->nama,
            'fakultas' => $field->fakultas,
            'jurusan' => $field->jurusan,
            'peminatan' => $field->peminatan,
            'angkatan' => $field->angkatan,
        ];
    }
}