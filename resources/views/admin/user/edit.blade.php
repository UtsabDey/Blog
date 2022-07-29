@extends('admin.layouts.master')
@section('title', 'Edit Users')
@section('content')
    <div class="container-fluid px-4">
        <div class="row justify-content-center mb-5">
            <div class="col-md-10">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <h4>
                            Edit Users
                            <a href="{{ route('users.index') }}" class="btn btn-danger btn-sm float-end"><i
                                class="fa-solid fa-arrow-left me-2"></i></i>Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ $user->email }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="">Created At</label>
                            <input type="text" class="form-control" name="created_at" value="{{ $user->created_at->format('d-m-Y') }}" readonly>
                        </div>
                        <form action="{{ route('users.update', $user->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="">Role As</label>
                                <select name="role_as" class="form-control">
                                    <option value="0" {{ $user->role_as == '0' ? 'selected' : ''}}>User</option>
                                    <option value="1" {{ $user->role_as == '1' ? 'selected' : ''}}>Admin</option>
                                    <option value="2" {{ $user->role_as == '2' ? 'selected' : ''}}>Blogger</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-save me-1"></i> Update User Role</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
