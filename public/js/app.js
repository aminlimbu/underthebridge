
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

console.log('working');
