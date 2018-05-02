@extends('layouts.app')


@section('content')

<div class="row">
    <div class="col-md-7">
        
        <h4>Edit Products</h4>
        
        <form action="{{ route('products.update', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="">Price</label>
                <input type="number" name="price" value="{{ $product->price }}" class="form-control">
            </div>
            
            
            <div class="form-group">
                <img src="{{ asset($product->image) }}" style="width:120px;">
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            
            <div class="form-group">
                <button class="btn btn-info">Edit</button>
            </div>
            
            
        </form>
        
    </div>
</div>

@endsection