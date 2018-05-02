@extends('admin.dashboard')


@section('content')

<div class="row">
    <div class="col-md-7">
        
        <h4>Products</h4>
        
        <table class="table table-bordered table-hover">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Remove</th>
            </thead>
            <tbody>
                @if(isset($products))
                   @foreach($products->all() as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td><img src="{{ asset($product->image) }}" style="width:80px;"></td>
                        <td><a href="{{ route('products.edit', ['id' => $product->id]) }}" class="btn btn-info">Edit</a></td>
                        <td>
                            <form action="{{ route('products.destroy', ['id' => $product->id]) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        
    </div>
</div>

@endsection