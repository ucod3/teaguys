$(document).ready(function(){
    gsap.to(".welcomePage",1,{opacity:1});

    $(".closeButton").click(function () {
        gsap.to(".welcomePage",1,{opacity:0});
        gsap.to(".welcomePage",1,{display:"none", delay:1.5});
    });

    gsap.to(".welcomePage",1,{opacity:0, delay:2});
    gsap.to(".welcomePage",1,{display:"none", delay:2.5});
    
    gsap.to("#logoImgLoading",0.2,{y:-10, repeat:-1, yoyo: true});

    gsap.to(".welcomePageOther",1,{opacity:0, delay:1});
    gsap.to(".welcomePageOther",1,{display:"none", delay:1.5});

});