<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    
	public function index(){
		return view('home');
	}

	public function simpanUser(Request $request){
		$input = $request->all();

		
			$execute = \App\userModel::execute_user($input);

			if($execute){
				echo "Berhasil mengubah user.";
			}else{
				echo "Gagal mengubah user.";
			}
		

	}

}
