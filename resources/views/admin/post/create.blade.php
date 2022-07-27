@extends('admin.layouts.master')
@section('title', 'Add Post')
@section('content')
    <div class="container-fluid px-4">
        <div class="row justify-content-center mb-5">
            <div class="col-md-10">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <h4>
                            Add Post
                        </h4>
                    </div>
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif --}}
                    <div class="card-body">
                        <form action="{{ route('posts.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="">Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Post Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                    placeholder="Post Name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{ old('slug') }}"
                                    placeholder="Slug">
                                @error('slug')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea class="form-control" name="description" id="mySummernote" required placeholder="Description">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Youtube Frame Link</label>
                                <input type="text" class="form-control" name="yt_iframe" value="{{ old('yt_iframe') }}"
                                    placeholder="Youtube Link">
                                @error('slug')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <h6>SEO Tags</h6>
                            <div class="mb-3">
                                <label for="">Meta title</label>
                                <input type="text" class="form-control" name="meta_title"
                                    value="{{ old('meta_title') }}" placeholder="Meta title" required>
                                @error('meta_title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Description</label>
                                <textarea class="form-control" name="meta_description" rows="3" required placeholder="Meta Description">{{ old('meta_description') }}</textarea>
                                @error('meta_description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Keyword</label>
                                <textarea class="form-control" name="meta_keyword" rows="3" required placeholder="Meta Keyword">{{ old('meta_keyword') }}</textarea>
                                @error('meta_keyword')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <h6>Status Mode</h6>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="">Status</label>
                                    <input type="checkbox" name="status">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary float-end"><i
                                            class="fas fa-save me-2"></i>Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
