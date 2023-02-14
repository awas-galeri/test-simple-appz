@extends('layouts.master')

@section('content')
    {{-- Hero Section --}}
    <section class="hero" id="home">
        <main class="content">
            <h1 id="hero">What Can I Do <span>For You</span>?</h1>
        </main>
    </section>
    {{-- /Hero Section --}}

    {{-- About Section --}}
    <section class="about" id="about">
        <h2>About <span>Us</span></h2>
        <div class="row">
            <div class="about-img">
                <img src="{{ url('/') }}/assets/img/heroes.jpg" alt="about us">
            </div>
            <div class="content">
                <h3>Being something useful for all problems.</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque dignissimos neque distinctio officiis
                    modi nisi!</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequatur quod quibusdam expedita eaque
                    voluptates ad distinctio incidunt nesciunt amet saepe?</p>
            </div>
        </div>
    </section>
    {{-- /About Section --}}

    @auth
        {{-- Project --}}
        <section class="project" id="project">
            <h2><span>Our</span> Project</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed harum consequatur debitis impedit, quisquam qui.</p>
            <div class="row">
                <div class="project-card">
                    <a href="{{ url('blog-page') }}"><img src="https://source.unsplash.com/200x200?blog=" alt="project"
                            class="project-card-img">
                        <h3 class="project-card-title">- Blogs -</h3>
                    </a>
                </div>
                <div class="project-card">
                    <a href="{{ url('news-page') }}"><img src="https://source.unsplash.com/200x200?news=" alt="project"
                            class="project-card-img">
                        <h3 class="project-card-title">- News Portal -</h3>
                    </a>
                </div>
                <div class="project-card">
                    <a href="{{ url('movies') }}"><img src="https://source.unsplash.com/200x200?movie=" alt="project"
                            class="project-card-img">
                        <h3 class="project-card-title">- Movies Search -</h3>
                    </a>
                </div>
                <div class="project-card">
                    <a href="{{ url('users-page') }}"><img src="https://source.unsplash.com/200x200?people=" alt="project"
                            class="project-card-img">
                        <h3 class="project-card-title">- User List -</h3>
                    </a>
                </div>
                {{-- <div class="project-card">
                <img src="https://source.unsplash.com/202x200?aplication=" alt="project" class="project-card-img">
                <h3 class="project-card-title">- Aplication -</h3>
            </div> --}}
                {{-- <div class="project-card">
                <img src="https://source.unsplash.com/203x200?aplication=" alt="project" class="project-card-img">
                <h3 class="project-card-title">- Aplication -</h3>
            </div> --}}
            </div>
        </section>
        {{-- /Project --}}
    @else
        {{-- Project --}}
        <section class="project" id="project">
            <h2><span>Our</span> Project</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed harum consequatur debitis impedit, quisquam qui.</p>
            <div class="row">
                <div class="project-card">
                    <a href="{{ url('blog-project') }}"><img src="https://source.unsplash.com/200x200?blog=" alt="project"
                            class="project-card-img">
                        <h3 class="project-card-title">- Blogs -</h3>
                    </a>
                </div>
                <div class="project-card">
                    <a href="{{ url('news-project') }}"><img src="https://source.unsplash.com/200x200?news=" alt="project"
                            class="project-card-img">
                        <h3 class="project-card-title">- News Portal -</h3>
                    </a>
                </div>
                <div class="project-card">
                    <a href="{{ url('users-page') }}"><img src="https://source.unsplash.com/200x200?people=" alt="project"
                            class="project-card-img">
                        <h3 class="project-card-title">- User List -</h3>
                    </a>
                </div>
        </section>
        {{-- /Project --}}
    @endauth


    {{-- Contact --}}
    <section class="contact" id="contact">
        <h2>Contact <span>Us</span></h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed harum debitis impedit, quisquam qui.</p>
        <div class="row">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63239.36473681289!2d112.01401022342593!3d-7.846798023447533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e785820b794a6b3%3A0x3d93712a11088087!2sKec.%20Pesantren%2C%20Kabupaten%20Kediri%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1674206297895!5m2!1sid!2sid"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
            <form action="">
                <div class="input-group">
                    <i data-feather="user"></i>
                    <input type="text" placeholder="name">
                </div>
                <div class="input-group">
                    <i data-feather="mail"></i>
                    <input type="email" placeholder="email">
                </div>
                <div class="input-group">
                    <i data-feather="phone"></i>
                    <input type="number" placeholder="whatsapp">
                </div>
                <button type="submit" class="btn">SEND</button>
            </form>
        </div>
    </section>
    {{-- /Contact --}}
@endsection
