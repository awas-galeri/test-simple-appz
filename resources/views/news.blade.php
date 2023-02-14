@extends('layouts.pages')

@section('content')
    <div class="container">
        <div class="row text-center">
            @if ($newses->count())
                <div class="col-lg">
                    <div class="card my-3">
                        <img src="https://source.unsplash.com/1200x400?news=" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $newses[0]->title }}</h5>
                            <p class="card-text"><small class="text-muted">Author by. <a href="{{ url('profile') }}"
                                        class="text-decoration-none">{{ $newses[0]->user->name }}</a> at
                                    {{ $newses[0]->updated_at->diffForHumans() }}</small>
                            </p>
                            <p class="card-text">{{ $newses[0]->excerpt }}</p>
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
            @foreach ($newses->skip(1) as $news)
                <div class="col-lg-4 p-3 d-flex justify-content-center">
                    <div class="card">
                        <img src="https://source.unsplash.com/1201x400?news=" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $news->title }}</h5>
                            <p class="card-text"><small class="text-muted">Author by. <a href="{{ url('profile') }}"
                                        class="text-decoration-none">{{ $news->user->name }}</a></small>
                            </p>
                            <p class="card-text">{{ $news->excerpt }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $newses->links() }}
    </div>
@endsection
