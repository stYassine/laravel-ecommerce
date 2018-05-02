@extends('layouts.app')


@section('content')

<div class="row">
    <div class="col-md-7">
        
        <h4>Create Products</h4>
        
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="">Price</label>
                <input type="number" name="price" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            
            <div class="form-group">
                <button class="btn btn-success">Create</button>
            </div>
            
            
        </form>
        
    </div>
</div>

@endsection