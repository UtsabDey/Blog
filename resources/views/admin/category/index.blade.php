@extends('admin.layouts.master')
@section('title', 'View Category')
@section('content')
    <div class="container-fluid px-4">
        <div class="row justify-content-center mb-5">
            <div class="col-md-10">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <h4>
                            View Category
                            <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm float-end"><i
                                    class="fas fa-plus me-2"></i></i>Add Category</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col" width="1%">ID</th>
                                    <th scope="col" width="5%">Category Name</th>
                                    <th scope="col" width="5%">Image</th>
                                    <th scope="col" width="2%">Status</th>
                                    <th scope="col" width="5%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $list)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $list->name }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset('images/category/' . $list->image) }}" alt=""
                                                width="100px" height="50px" />
                                        </td>
                                        <td>{{ $list->status == '1' ? 'Hidden' : 'Shown' }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('category.edit', $list->id) }}"
                                                    class="btn btn-info btn-sm me-2"><i class="fa fa-edit me-1"></i>Edit</a>
                                                <form action="{{ route('category.destroy', $list->id) }}" method="post">
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
