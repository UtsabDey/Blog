@extends('admin.layouts.master')
@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid px-4">
        <div class="row justify-content-center mb-5">
            <div class="col-md-10">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <h4>
                            Website Settings
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('settings.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="">Website Name</label>
                                <input type="text" class="form-control" name="website_name"
                                    @if ($setting) value="{{ $setting->website_name }}" @endif
                                    placeholder="Website Name" required>
                                @error('website_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Website Logo</label>
                                <input type="file" class="form-control" name="logo" value=""><br>
                                Logo: &nbsp;
                                @if ($setting)
                                    <img src="{{ asset('images/setting/'.$setting->logo) }}" alt="" width="70px"/>
                                @endif
                                @error('logo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Website Favicon</label>
                                <input type="file" class="form-control" name="favicon" value=""><br>
                                Favicon: &nbsp;
                                @if ($setting)
                                    <img src="{{ asset('images/setting/'.$setting->favicon) }}" alt="" width="40px"/>
                                @endif
                                @error('favicon')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea class="form-control" name="description" id="mySummernote" required placeholder="Description"> @if ($setting)
                                {{ $setting->description }}
                                @endif
                                </textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <h6>SEO Tags</h6>
                            <div class="mb-3">
                                <label for="">Meta title</label>
                                <input type="text" class="form-control" name="meta_title"
                                    @if ($setting) value="{{ $setting->meta_title }}" @endif
                                    placeholder="Meta title" required>
                                @error('meta_title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Description</label>
                                <textarea class="form-control" name="meta_description" rows="3" required placeholder="Meta Description">
                                @if ($setting)
                                {{ $setting->meta_description }}
                                @endif
                                </textarea>
                                @error('meta_description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Meta Keyword</label>
                                <textarea class="form-control" name="meta_keyword" rows="3" required placeholder="Meta Keyword">
                                @if ($setting)
                                {{ $setting->meta_keyword }}
                                @endif
                                </textarea>
                                @error('meta_keyword')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary float-end"><i
                                        class="fas fa-save me-2"></i>Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
