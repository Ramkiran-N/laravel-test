@extends('layout')
<div class="container admin">
    <div class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="col-md-6 border p-5">
            <h3 class="text-center mb-3">Add Product</h3>
            <form action="" method="POST" id='addProduct'>
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Product Name</label>
                    <div class="col-sm-10">
                      <input type="text"  class="form-control" value="" name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Price (USD)</label>
                    <div class="col-sm-10">
                      <input type="text"  class="form-control" value="" name="price">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Stock</label>
                    <div class="col-sm-10">
                      <input type="text"  class="form-control" value="" name="stock">
                    </div>
                </div>
                <div class="text-center mt-4">
                    <input type="submit" class="btn btn-primary  mx-auto">
                </div>
                
            </form>
        </div>
    </div>
</div>