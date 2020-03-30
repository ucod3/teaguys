// scripts to run when the document is ready
$(document).ready(function(){
    // welcome animation
    gsap.to(".welcomePage",1,{opacity:1});

    // close button function
    $(".closeButton").click(function () {
        gsap.to(".welcomePage",1,{opacity:0});
        gsap.to(".welcomePage",1,{display:"none", delay:1.5});
    });

    // auto hide after 2.5 seconds
    gsap.to(".welcomePage",1,{opacity:0, delay:2});
    gsap.to(".welcomePage",1,{display:"none", delay:2.5});
    
    // logo image animation
    gsap.to("#logoImgLoading",0.2,{y:-10, repeat:5, yoyo: true});

    // auto hide welcome for other pages
    gsap.to(".welcomePageOther",1,{opacity:0, delay:1});
    gsap.to(".welcomePageOther",1,{display:"none", delay:1.5});

});