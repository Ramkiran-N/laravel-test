@extends('layout')

<div class="user container py-5">
    <div class="row">
        <div class="col-md-5">
            <form action="" id="addToCartForm">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <h6>Item Name</h6>
                        <select name="product" id="productSelectBox">
                            <option value="">Select Item</option>
                            @foreach($products as $item)
                            <option value="{{$item->id}}" data-price="{{$item->price}}">{{$item->name}}-stock {{$item->stock}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <h6>Item Price</h6>
                        <span id='price'>0</span>
                    </div>
                    <div class="col-md-4">
                        <h6>Item Quantity</h6>
                        <input type="number" id="qty" class=' col-md-12' value="1" name='qty' min="1">
                    </div>
                </div>
                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-primary" id='#addToCartBtn'>Add to Cart</button>
                </div>
            </form>
        </div>
        <div class="col-md-7 cart-items" id="cartItems">
            <div class="row">
                <div class="col-md-3">Name</div>
                <div class="col-md-2">Price</div>
                <div class="col-md-2">Quantity</div>
                <div class="col-md-3">Total</div>
                <div class="col-md-2">Action</div>
            </div>
        </div>
       
    </div>
   
</div>
