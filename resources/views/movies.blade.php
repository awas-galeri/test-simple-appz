@extends('layouts.pages')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-7 d-flex justify-content-center">
            <h1>Search Movies</h1>
        </div>
        <div class="col-lg-6">
            <div class="input-group m-3">
                <input type="text" class="form-control" placeholder="Search Title.." id="search-input" autofocus>
                <button type="button" class="btn btn-outline-secondary" id="search-button">Search</button>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" id="movie-list">
            <hr>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Movie</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
