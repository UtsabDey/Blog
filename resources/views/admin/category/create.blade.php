@extends('admin.layouts.master')
@section('title', 'Add Category')
@section('content')
    <div class="container-fluid px-4">
        <div class="row justify-content-center mb-5">
            <div class="col-sm-8">
                <div class="card mt-4 shadow">
                    <h5 class="card-header">Add Category</h5>
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="">Category Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Category Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="">Slug</label>
                                <input type="text" class="form-control" name="slug" placeholder="Slug">
                            </div>
                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea class="form-control" name="description" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="image" placeholder="Image">
                            </div>
                            <h6>SEO Tags</h6>
                            <div class="mb-3">
                                <label for="">Meta title</label>
                                <input type="text" class="form-control" name="meta_title" placeholder="Meta title" required>
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Description</label>
                                <input type="text" class="form-control" name="meta_description" placeholder="Meta Description" required>
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Keyword</label>
                                <input type="text" class="form-control" name="meta_keyword" placeholder="Meta Keyword">
                            </div>
                            <h6>Status Mode</h6>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="">Navbar Status</label>
                                    <input type="checkbox" name="navbar_status" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="">Status</label>
                                    <input type="checkbox" name="status" required>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary float-end"><i class="fas fa-save me-2"></i>Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
