@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="display:flex; justify-content: space-between; align-items: center">
                    <div>
                        {{ __('Product list') }}
                    </div>
                    @role('admin')
                    <a href="{{ route('product-add') }}" class="btn btn-primary" style="">Add</a>
                    @endrole
                </div>

                <div class="card-body">
                    <div>
                    <table style="width:100%">
                        <tr style="font-weight: bold;border-bottom: 1px solid #ddd;">
                            <td style="padding-bottom: 5px;">ID</td>
                            <td style="padding-bottom: 5px;">Product Name</td>
                            <td style="padding-bottom: 5px;">Description</td>
                            <td style="padding-bottom: 5px;">Price</td>
                            <td></td>
                            <td></td>
                        </tr>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->product_desc}}</td>
                            <td>{{$product->product_price}}</td>
                            
                            @role('admin')
                            <td style="text-align-last: center;"><a class="btn btn-secondary" href="{{ route('product-edit', $product->id) }}">Edit</a></td>
                            <td style="text-align-last: center; padding:5px;"><a class="btn btn-danger" href="{{ route('product-delete', $product->id) }}">Delete</a></td>
                            @endrole
                        </tr>
                        @endforeach
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
