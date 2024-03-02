<?php

namespace App\Http\Admin;

use App\Http\Admin\AdminRepository;

class AdminService 
{
    public function store($request)
    {
        $repository = new AdminRepository;
        $data = $request->all();
        unset($data['_token']);
        $res =  $repository->store($data);
        if($res){
            return ['status'=>200,'msg'=>'Stored Succefully'];
        }else{
            return ['status'=>401,'msg'=>'Sorry, Something went wrong!'];
        }
    }
}
