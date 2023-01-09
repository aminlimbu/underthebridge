
// Navbar background on scroll
const navbar = document.querySelector(".navbar");

window.addEventListener('scroll', function(){
    const winHeight = window.pageYOffset;
    const navHeight = navbar.getBoundingClientRect().height;
    if(winHeight > navHeight){
        navbar.classList.add("transblack");
    }else{
        navbar.classList.remove("transblack");
    }
});


// Back to top button
var btnClass = document.getElementById('backTop');

document.addEventListener('scroll', handleScroll);

function handleScroll(){
    if(window.scrollY > 500){
        btnClass.classList.add('backToTopShow')
        btnClass.classList.remove('backToTop')
    }else{
        btnClass.classList.remove('backToTopShow')
    }
}