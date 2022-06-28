@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            All Category
          </div>
          <div class="row">
            <div class="col-md-6 mb-4">
                <td>
                    <a href="{{ route('add_category') }}"><button type="button" class="btn btn-success">Add Category</button></a>
                </td>
            </div>
          </div>
          <div class="col-12">
            <div class="row">
              @foreach ($categories as $item)
              <div class="col-md-3 col-sm-6">
                <div class="card">
                  <img class="card-img-top" src="{{ asset('assets/category/'.$item->image) }}" style="width: 150px; height: 150px;" alt="image">
                  <br>
                  <div class="card-body">
                    <h6 class="card-title">Category Name: {{ $item->name }}</h6>
                    <br>
                    <p class="font-weight-bold">Category Title: {{ $item->meta_title }}</p>
                    <br>
                    <a href="{{ route('edit_category',[$item->id]) }}" class="btn btn-success btn-sm">Edit</a>
        
                    <a href="{{ route('delete_category',[$item->id]) }}" class="btn btn-danger btn-sm">Delete</a>
        
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <div class="row">
            {{ $categories->links() }}
        </div>
        </div>
        @endsection