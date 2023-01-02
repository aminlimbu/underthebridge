
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
// var category = 'happiness'
// $.ajax({
//     mehtod: 'GET',
//     url: 'https://api.api-ninjas.com/v1/quotes?category=' + category,
//     headers: {'X-Api-key' : 'S0c6RsOKHX6U6OxgWZ9gpg==6QiLc1yU36MynFNA'},
//     contentType: 'application/json',
//     success : function(result){
//         var x = JSON.stringify(result);
//         console.log(x);
//         console.log(x.quote);
//         // console.log(x);
//         $('.seaquotes').append(x.quote);
//         // console.log(result);
//     },
//     error: function ajaxError(jqXHR){
//         console.error('Error: ', jqXHR.responseText);
//     }
// });

// const navbar = document.getElementById("nav");
// const topLink = document.querySelector(".top-link");

// window.addEventListener("scroll", function () {
//   const scrollHeight = window.pageYOffset;
//   const navHeight = navbar.getBoundingClientRect().height;
//   if (scrollHeight > navHeight) {
//     navbar.classList.add("fixed-nav");
//   } else {
//     navbar.classList.remove("fixed-nav");
//   }
//   // setup back to top link

//   if (scrollHeight > 500) {
//     console.log("helo");

//     topLink.classList.add("show-link");
//   } else {
//     topLink.classList.remove("show-link");
//   }
// });