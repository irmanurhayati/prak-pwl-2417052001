<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\UserModel;
Use App\Models\Kelas;

class UserController extends Controller
{
    public function create(){
        $kelasModel = new Kelas(); 
        $kelas = $kelasModel->getKelas(); 
        $data = [
            'tittle' => 'Create User',
            'kelas' => $kelas
         ];
        return view('user.create', $data);

    

    }

}
