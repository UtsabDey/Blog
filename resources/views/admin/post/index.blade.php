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
                        <table class="table table-bordered table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col" width="1%">ID</th>
                                    <th scope="col" width="3%">Category</th>
                                    <th scope="col" width="5%">Post Name</th>
                                    <th scope="col" width="2%">Status</th>
                                    <th scope="col" width="5%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>{{ $post->name }}</td>
                                        <td>{{ $post->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('posts.edit', $post->id) }}"
                                                    class="btn btn-info btn-sm me-2"><i class="fa fa-edit me-1"></i>Edit</a>
                                                <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this item?')"><i
                                                            class="fa fa-trash me-1"></i>Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
