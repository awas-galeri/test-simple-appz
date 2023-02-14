@extends('layouts.pages')

@section('content')
    <div class="container">
        <div class="row text-center">
            @if ($blogs->count())
                <div class="col-lg">
                    <div class="card my-3">
                        <img src="https://source.unsplash.com/1200x400?blog=" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $blogs[0]->title }}</h5>
                            <p class="card-text"><small class="text-muted">Author by. <a href="{{ url('profile') }}"
                                        class="text-decoration-none">{{ $blogs[0]->user->name }}</a> at
                                    {{ $blogs[0]->updated_at->diffForHumans() }}</small>
                            </p>
                            <p class="card-text">{{ $blogs[0]->excerpt }}</p>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-lg fs-3">
                    <p>No post found.</p>
                </div>
            @endif
        </div>
        <div class="row justify-content-center">
            @foreach ($blogs->skip(1) as $blog)
                <div class="col-lg-4 p-3 d-flex justify-content-center">
                    <div class="card">
                        <img src="https://source.unsplash.com/1201x400?blog=" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            <p class="card-text"><small class="text-muted">Author by. <a href="{{ url('profile') }}"
                                        class="text-decoration-none">{{ $blog->user->name }}</a></small>
                            </p>
                            <p class="card-text">{{ $blog->excerpt }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $blogs->links() }}
    </div>
@endsection
