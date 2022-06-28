@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            All Product
          </div>
          <div class="row">
            <div class="col-md-6 mb-4">
                <td>
                    <a href="{{ route('add_product') }}"><button type="button" class="btn btn-success">Add Product</button></a>
                </td>
            </div>
          </div>
          <div class="col-12">
            <div class="row">
              @foreach ($products as $item)
              <div class="col-md-3 col-sm-6">
                <div class="card">
                  <img class="card-img-top" src="{{ asset('assets/product/'.$item->image) }}" style="width: 170px; height: 150px;" alt="Image here">
                  <br>
                  <div class="card-body">
                    <h6 class="card-title">Product Name: 
                      {{ $item->name }}</h6>
                    <br>
                    <h6 class="card-title"> Original Price:
                      {{ $item->original_price }}</h6>
                    <br>
                    <h6 class="card-title"> Selling Price:
                      {{ $item->selling_price }}</h6>
                    <br>
                    <a href="{{ route('edit_product',[$item->id]) }}" class="btn btn-success btn-sm">Edit</a>
        
                    <a href="{{ route('delete_product',[$item->id]) }}" class="btn btn-danger btn-sm">Delete</a>
        
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <div class="row">
            {{ $products->links() }}
        </div>
        </div>
        @endsection