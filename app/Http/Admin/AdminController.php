<?php

namespace App\Http\Admin;

use Illuminate\Http\Request;
use App\Http\Admin\AdminService;

class AdminController 
{
    // protected $service;
    // public function __contruct(AdminService $service)
    // {
    //     $this->service = $service;
    // }
    public function show()
    {
        return view('admin');
    }
    public function store(Request $request)
    {
        try {
            $service = new AdminService();
            $res =  $service->store($request);
            return response()->json($res);
        } catch (\Throwable $th) {
           dd($th);
        }
    

    }
}
