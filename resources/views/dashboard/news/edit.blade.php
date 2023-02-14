@extends('layouts.primary')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-lg-10 d-flex justify-content-center mt-2">
            <div class="card-fluid" role="document">
                <form action="/news/{{ $newses->id }}" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">News</h5>
                        </div>
                        <div class="modal-body">
                            <form class="comment-form">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label">Title</label>
                                            <input type="text" class="form-control" name="title"
                                                placeholder="Input Title" value="{{ $newses->title }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label" for="excerpt">Excerpt</label>
                                            <textarea class="form-control" name="excerpt" placeholder="Input Excerpt" id="excerpt" style="height: 75px">{{ $newses->excerpt }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="text-black font-w600 form-label" for="body">Content</label>
                                            {{-- <input type="text" class="form-control" name="body"
                                                placeholder="Input Body" value="{{ $newses->body }}"> --}}
                                            <textarea class="form-control" name="content" placeholder="Input Content" id="body" style="height: 150px">{{ $newses->content }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-2 text-end">
                                        <div class="mb-3 mb-0">
                                            <input type="submit" value="Save" class="submit btn btn-primary"
                                                name="submit">
                                            <a href="{{ url('news') }}" class="submit btn btn-danger">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
