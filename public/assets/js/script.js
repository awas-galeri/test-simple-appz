// Toggle class active
const navbarNav = document.querySelector('.navbar-nav');
// ketika humberger menu di klik
document.querySelector('#hamburger-menu').onclick = () => {
    navbarNav.classList.toggle('active');
}

// klik di luar sidebar untuk menghilangkan navbar
const hamburger = document.querySelector('#hamburger-menu');

document.addEventListener('click', function (e) {
    if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
        navbarNav.classList.remove('active');
    }
})

// On Load
$(window).on('load', function () {
    // Navbar
    $('.navbar').addClass('nMuncul')

    // Hero
    setTimeout(() => {
        $('.hero .content h1').addClass('hMuncul')
    }, 1000);
})

// On Scroll
$(window).scroll(function () {
    let wScroll = $(this).scrollTop();

    // About
    if (wScroll > $('#about').offset().top - 150) {
        $('.content').addClass('aMuncul');
    }

    // Project
    if (wScroll > $('#project').offset().top - 250) {
        $('.project-card').each(function (i) {
            setTimeout(function () {
                $('.project-card').eq(i).addClass('pMuncul');
            }, 400 * (i + 1));
        });
    }

})

// On Click User Dropdown
const profile = document.querySelector('nav .navbar-extra');
const user = profile.querySelector('.user');
const dropdownProfile = profile.querySelector('.profile-link');

user.addEventListener('click', function () {
    dropdownProfile.classList.toggle('show');
})

// klik di luar user untuk menghilangkan modalbox
document.addEventListener('click', function (e) {
    if (!user.contains(e.target)) {
        dropdownProfile.classList.remove('show');
    }
})