@extends('admin.layouts.master')
@section('title', 'View Post')
@section('content')
    <div class="container-fluid px-4">
        <div class="row justify-content-center mb-5">
            <div class="col-md-10">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <h4>
                            View Post
                            <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm float-end"><i
                                    class="fas fa-plus me-2"></i></i>Add Post</a>
                        </h4>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
