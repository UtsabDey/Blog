@extends('layouts.app')
@section('title', "$post->meta_title")
@section('meta_description', "$post->meta_description")
@section('meta_keyword', "$post->meta_keyword")
@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="category-heading">
                        <h4>{{ $category->name }}</h4>
                    </div>

                    @forelse ($post as $item)
                        <div class="card card-shadow mt-4">
                            <div class="card-body">
                                <a href="{{ url('tutorial/' . $category->slug . '/' . $item->slug) }}"
                                    class="text-decoration-none">
                                    <h2 class="post-heading"> {{ $item->name }}</h2>
                                </a>
                                <h6>
                                    Posted On: {{ $item->created_at->format('d-m-Y') }}
                                    <span class="ms-3">Posted By: {{ $item->user->name }}</span>
                                </h6>
                            </div>
                        </div>
                    @empty
                        <div class="card card-shadow mt-4">
                            <div class="card-body">
                                <h1>No Post Available</h1>
                            </div>
                        </div>
                    @endforelse
                    <div class="your-paginate">
                        {{ $post->links() }}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="border p-2">
                        <h4>Advertising Area</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
