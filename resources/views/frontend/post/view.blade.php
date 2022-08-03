@extends('layouts.app')
@section('title', "$post->meta_title")
@section('meta_description', "$post->meta_description")
@section('meta_keyword', "$post->meta_keyword")
@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="category-heading">
                        <h4 class="mb-0">{!! $post->name !!}</h4>
                    </div>
                    <div class="mt-3">
                        <h6>{{ $post->category->name . '/' . $post->name }}</h6>
                    </div>

                    <div class="card card-shadow mt-4">
                        <div class="card-body post-description">
                            {!! $post->description !!}
                        </div>
                    </div>

                    <div class="comment-area mt-4">
                        <div class="card card-body">
                            <h6 class="card-title">Leave a comment</h6>
                            <form action="{{ route('comment.store') }}" method="post">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <div>{{ $error }}</div>
                                        @endforeach
                                    </div>
                                @endif
                                <input type="hidden" name="post_slug" value="{{ $post->slug }}">
                                <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>

                        @forelse ($post->comments as $comment)
                            <div class="card card-body shadow-sm mt-3">
                                <div class="detail-area">
                                    <h6 class="user-name mb-1">
                                        @if ($comment->user->name)
                                            {{ $comment->user->name }}
                                        @endif
                                        <small class=" ms-3 text-primary">Commented on:
                                            {{ $comment->created_at->format('d-m-Y') }}</small>
                                    </h6>
                                    <p class="user-comment mb-1">
                                        {!! $comment->comment !!}
                                    </p>
                                </div>
                                @if (Auth::check() && Auth::id() == $comment->user_id)
                                    <div>
                                        {{-- <a href="" class="btn btn-primary btn-sm me-2">Edit</a> --}}
                                        <form action="{{ route('comment.destroy', $comment->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this item?')"><i
                                                    class="fa fa-trash me-1"></i>Delete</button>
                                        </form>
                                    </div>
                                @elseif(Auth::check() && Auth::user()->role_as == '1')
                                    <div>
                                        <form action="{{ route('comment.destroy', $comment->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this item?')"><i
                                                    class="fa fa-trash me-1"></i>Delete</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        @empty
                            <div class="card card-body shadow-sm mt-3">
                                <h6 class="mt-3">No Comments Yet.</h6>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border p-2 my-2">
                        <h4>Advertising Area</h4>
                    </div>
                    <div class="border p-2 my-2">
                        <h4>Advertising Area</h4>
                    </div>
                    <div class="border p-2 my-2">
                        <h4>Advertising Area</h4>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h4>Latest Posts</h4>
                        </div>
                        <div class="card-body">
                            @foreach ($latest_post as $item)
                                <a href="{{ url('tutorial/' . $item->category->slug . '/' . $item->slug) }}"
                                    class="text-decoration-none">
                                    <h6>> {{ $item->name }}</h6>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
