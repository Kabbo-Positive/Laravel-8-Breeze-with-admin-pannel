@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Category</h4>
        </div>
        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <div class="card-body">
            <form action="{{ route('update_category',[$categories->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">

                    @if ($categories->image)
                         <img src="{{ asset('assets/category/'.$categories->image) }}" width="50px" height="50px" alt="Img">
                    @endif
                    <div class="col-md-12">
                        <label for="">Category Image</label>
                        <input type="file" class="form-control" value="{{ $categories->image }}"  name="image" required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="">Category Name</label>
                        <input type="text" class="form-control" value="{{ $categories->name }}" name="name" required>
                    </div>
                   
                    <div class="col-md-6 mb-4">
                        <label for="">Category Slug</label>
                        <input type="text" class="form-control" value="{{ $categories->slug }}" name="slug" required>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label for="">Description</label>
                        <textarea type="text" class="form-control" name="description" required>{{ $categories->description }}</textarea>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label for="">Meta Title</label>
                        <textarea type="text" class="form-control" name="meta_title" required>{{ $categories->meta_title }}</textarea>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label for="">Meta Description</label>
                        <textarea type="text" class="form-control" name="meta_description" required>{{ $categories->meta_description }}</textarea>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label for="">Meta Keyword</label>
                        <textarea type="text" class="form-control" name="meta_keyword" required>{{ $categories->meta_keyword }}</textarea>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for=""> Status</label>
                        <input type="checkbox" name="status" {{ $categories->status == '1' ? 'Checked':'' }}>
                    </div>
                    
                    <div class="col-md-3 mb-3">
                        <label for=""> Popular</label>
                        <input type="checkbox" name="popular" {{ $categories->popular == '1' ? 'Checked':'' }}>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn w-100 btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection