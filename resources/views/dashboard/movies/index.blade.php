@extends('layouts.primary')

@section('content')
    <main>
        <h1 class="title">{{ $title }}</h1>
        <ul class="breadcrumbs">
            <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
            <li class="divider">/</li>
            <li><a href="{{ url('movies') }}">Movies</a></li>
            <li class="divider">/</li>
            <li><span class="text-muted">Credit</span></li>
        </ul>

        <div class="info-data">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 d-flex justify-content-center">
                        <h1>Search Movies</h1>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group m-3">
                            <input type="text" class="form-control" placeholder="Search Title.." id="search-input"
                                autofocus>
                            <button type="button" class="btn btn-outline-secondary" id="search-button">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row" id="movie-list">
                <hr>

            </div>
        </div>

        <div class="kosong">

        </div>

        <footer>
            <div class="container my-4">
                <div class="credit">
                    <p>Created by <a href="https://www.instagram.com" target="_blank" style="text-decoration: none">Awas
                            Galeri</a>. | &copy; 2023
                    </p>
                </div>
            </div>
        </footer>

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
    </main>
@endsection
@section('js')
    <script>
        function searchMovies() {
            $('#movie-list').html('');

            $.ajax({
                url: 'http://omdbapi.com/',
                type: 'get',
                dataType: 'json',
                data: {
                    'apikey': 'dca61bcc',
                    's': $('#search-input').val()
                },
                success: function(result) {
                    if (result.Response == "True") {
                        let movies = result.Search;
                        $.each(movies, function(i, data) {
                            $('#movie-list').append(`
                        <div class="col-md-4">
                            <div class="card my-3">
                                <div class="card-body">
                                <h5 class="card-title">` + data.Title + `</h5>
                                <h6 class="card-subtitle mb-2 text-muted">` + data.Year +
                                `</h6>
                                <a href="#" style="text-decoration: none;" class="card-link show-detail" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="` +
                                data.imdbID + `">Show Detail</a>
                                </div>
                            </div>
                        </div>
                    `);
                        })

                        $('#search-input').val('')

                    } else {
                        $('#movie-list').html(`<h3 class="text-center">` + result.Error + `</h3>`)
                    }
                },

            });
        }



        $('#search-button').on('click', function() {
            searchMovies();
        })

        $('#search-input').on('keyup', function(e) {
            if (e.keyCode === 13) {
                searchMovies();
            }
        })

        $('#movie-list').on('click', '.show-detail', function() {
            $.ajax({
                url: 'http://omdbapi.com/',
                type: 'get',
                dataType: 'json',
                data: {
                    'apikey': 'dca61bcc',
                    'i': $(this).data('id')
                },
                success: function(movie) {
                    if (movie.Response == "True") {
                        $('.modal-body').html(`
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="` + movie.Poster + `" class="img-fluid">
                            </div>
                            <div class="col-md-8">
                                <ul class="list-group">
                                    <li class="list-group-item"><h3>` + movie.Title + ` (` + movie.Year + `)</h3></li>
                                    <li class="list-group-item">Genre : ` + movie.Genre + `</li>
                                    <li class="list-group-item">Released : ` + movie.Released + `</li>
                                    <li class="list-group-item">Actors : ` + movie.Actors + `</li>
                                    <li class="list-group-item">Director : ` + movie.Director + `</li>
                                    <li class="list-group-item">Plot : <br> ` + movie.Plot + `</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                `)
                    }
                    console.log(movie);
                }
            })
        })
    </script>
@endsection
