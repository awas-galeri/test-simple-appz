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
        success: function (result) {
            if (result.Response == "True") {
                let movies = result.Search;
                $.each(movies, function (i, data) {
                    $('#movie-list').append(`
                        <div class="col-md-4">
                            <div class="card my-3">
                                <img src="`+ data.Poster + `" class="card-img" alt="...">
                                <div class="card-body">
                                <h5 class="card-title">`+ data.Title + `</h5>
                                <h6 class="card-subtitle mb-2 text-muted">`+ data.Year + `</h6>
                                <a href="#" style="text-decoration: none;" class="card-link show-detail" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="`+ data.imdbID + `">Show Detail</a>
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



$('#search-button').on('click', function () {
    searchMovies();
})

$('#search-input').on('keyup', function (e) {
    if (e.keyCode === 13) {
        searchMovies();
    }
})

$('#movie-list').on('click', '.show-detail', function () {
    $.ajax({
        url: 'http://omdbapi.com/',
        type: 'get',
        dataType: 'json',
        data: {
            'apikey': 'dca61bcc',
            'i': $(this).data('id')
        },
        success: function (movie) {
            if (movie.Response == "True") {
                $('.modal-body').html(`
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="`+ movie.Poster + `" class="img-fluid">
                            </div>
                            <div class="col-md-8">
                                <ul class="list-group">
                                    <li class="list-group-item"><h3>`+ movie.Title + ` (` + movie.Year + `)</h3></li>
                                    <li class="list-group-item">Genre : `+ movie.Genre + `</li>
                                    <li class="list-group-item">Released : `+ movie.Released + `</li>
                                    <li class="list-group-item">Actors : `+ movie.Actors + `</li>
                                    <li class="list-group-item">Director : `+ movie.Director + `</li>
                                    <li class="list-group-item">Plot : <br> `+ movie.Plot + `</li>
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