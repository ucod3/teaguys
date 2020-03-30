$(document).ready(function(){
    gsap.to(".welcomePage",1,{opacity:1});

    $(".closeButton").click(function () {
        gsap.to(".welcomePage",1,{opacity:0});
        gsap.to(".welcomePage",1,{display:"none", delay:1});
    });

});