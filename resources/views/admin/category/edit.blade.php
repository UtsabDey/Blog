@extends('admin.layouts.master')
@section('title', 'Edit Category')
@section('content')
    <div class="container-fluid px-4">
        <div class="row justify-content-center mb-5">
            <div class="col-sm-8">
                <div class="card mt-4 shadow">
                    <h5 class="card-header">Edit Category <a href="{{ route('category.index') }}"
                            class="btn btn-danger btn-sm float-end"><i class="fa-solid fa-arrow-left me-2"></i></i>Back</a></h5>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('category.update', $category->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="">Category Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $category->name }}"
                                    placeholder="Category Name" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{ $category->slug }}"
                                    placeholder="Slug">
                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea class="form-control" name="description" id="mySummernote" required>{{ $category->description }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="image" placeholder="Image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <h6>SEO Tags</h6>
                            <div class="mb-3">
                                <label for="">Meta title</label>
                                <input type="text" class="form-control" name="meta_title"
                                    value="{{ $category->meta_title }}" placeholder="Meta title" required>
                                @error('meta_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Description</label>
                                <input type="text" class="form-control" name="meta_description"
                                    value="{{ $category->meta_description }}" placeholder="Meta Description" required>
                                @error('meta_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Keyword</label>
                                <input type="text" class="form-control" name="meta_keyword"
                                    value="{{ $category->meta_keyword }}" placeholder="Meta Keyword">
                                @error('meta_keyword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <h6>Status Mode</h6>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="">Navbar Status</label>
                                    <input type="checkbox" name="navbar_status"
                                        {{ $category->navbar_status == '1' ? 'checked' : '' }}>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="">Status</label>
                                    <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked' : '' }}>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary float-end"><i
                                            class="fas fa-save me-2"></i>Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
