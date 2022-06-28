@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add Product</h4>
    </div>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <div class="card-body">
        <form action="{{ route('insert_product') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <label for="">Product Image</label>
                    <input type="file" class="form-control" name="image" required>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="">Product Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="">Product Slug</label>
                    <input type="text" class="form-control" name="slug" required>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="category_id">Category</label>
                    <select id="category_id" name="category_id" type="text" class="form-control" required>
                        <option value="">Select Categories</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="">Original price</label>
                    <input type="double" class="form-control" name="original_price" required>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="">Selling price</label>
                    <input type="double" class="form-control" name="selling_price" required>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="">Quantity</label>
                    <input type="double" class="form-control" name="quantity" required>
                </div>
    
                <div class="col-md-12 mb-4">
                    <label for="">Description</label>
                    <textarea type="text" class="form-control" name="description" required></textarea>
                </div>

                <div class="col-md-12 mb-4">
                    <label for="">Small Description</label>
                    <textarea type="text" class="form-control" name="small_description" required></textarea>
                </div>
                
                <div class="col-md-12 mb-4">
                    <label for="">Meta Title</label>
                    <textarea type="text" class="form-control" name="meta_title" required></textarea>
                </div>

                <div class="col-md-12 mb-4">
                    <label for="">Meta Description</label>
                    <textarea type="text" class="form-control" name="meta_description" required></textarea>
                </div>
                
                <div class="col-md-12 mb-4">
                    <label for="">Meta Keyword</label>
                    <textarea type="text" class="form-control" name="meta_keyword" required></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for=""> Status</label>
                    <input type="checkbox" name="status">
                </div>
                
                <div class="col-md-3 mb-3">
                    <label for=""> Trending</label>
                    <input type="checkbox" name="trending">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn w-100 btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    CKEDITOR.replace('description');
</script>
@endsection