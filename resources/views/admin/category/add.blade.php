@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add Category</h4>
    </div>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <div class="card-body">
        <form action="{{ route('insert_category') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <label for="">Category Image</label>
                    <input type="file" class="form-control" name="image" required>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="">Category Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                
                <div class="col-md-6 mb-4">
                    <label for="">Category Slug</label>
                    <input type="text" class="form-control" name="slug" required>
                </div>
                <div class="col-md-12 mb-4">
                    <label for="">Description</label>
                    <textarea type="text" class="form-control" name="description" required></textarea>
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
                    <label for=""> Popular</label>
                    <input type="checkbox" name="popular">
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