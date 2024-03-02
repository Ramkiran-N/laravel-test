<?php

namespace App\Http\Admin;

use App\Models\Product;

class AdminRepository 
{
    public function store($data)
    {
        return Product::create($data);
    }
    
}
