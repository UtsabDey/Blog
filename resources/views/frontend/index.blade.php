@extends('layouts.app')
@section('title', "$setting->meta_title")
@section('meta_description', "$setting->meta_description")
@section('meta_keyword', "$setting->meta_keyword")
@section('content')
    <div class="bg-danger py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel category-carousel owl-theme">
                        @foreach ($category as $item)
                            <div class="item">
                                <a href="{{ url('tutorial', $item->slug) }}" class="text-decoration-none">
                                    <div class="card">
                                        <div class="card-header">
                                            <img src="{{ asset('images/category/' . $item->image) }}" alt="Image">
                                        </div>
                                        <div class="card-body text-center">
                                            <h4 class="text-dark">{{ $item->name }}</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-2 bg-gray">
        <div class="container">
            <div class="border text-center p-3">
                <h3>Advertise Here</h3>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Blog Site</h4>
                    <div class="underline"></div>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                        and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                        leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                        with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                        publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>All Categories List</h4>
                    <div class="underline"></div>
                </div>
                @foreach ($category as $item)
                    <div class="col-md-3">
                        <div class="card card-body mb-3">
                            <a href="{{ url('tutorial', $item->slug) }}" class="text-decoration-none">
                                <h4 class="text-dark mb-0">{{ $item->name }}</h4>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Latest Posts</h4>
                    <div class="underline"></div>
                </div>
                <div class="col-md-8">
                    @foreach ($latest_post as $item)
                        <div class="card card-body bg-gray mb-3">
                            <a href="{{ url('tutorial', $item->category->slug . '/' . $item->slug) }}"
                                class="text-decoration-none">
                                <h4 class="text-dark mb-0">{{ $item->name }}</h4>
                            </a>
                            <h6>Posted On: {{ $item->created_at->format('d-m-Y') }}</h6>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <div class="border text-center p-3">
                        <h3>Advertise Here</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
