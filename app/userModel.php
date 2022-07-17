<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{

    static function getUserById(){

    	$query = DB::table('login')
    		 ->selectRaw('login.*,pegawai.namaPeg')
    		 ->where('noUser',AUTH::id())
    		 ->join('pegawai','login.NIP','=','pegawai.NIP')
    		 ->limit('1')
    		 ->get();

    		 return $query->toArray();

    }

    static function execute_user($input){
    	try {
    		
    		$query = DB::table('login')
    				 ->where('noUser',$input['noUser'])
    				 ->update([
    				 	'username' => $input['username'],
    				 	'password' => $input['password']
    				 ]);

    		return true;
    	} catch (Exception $e) {
    		return false;
    	}
    }

}
