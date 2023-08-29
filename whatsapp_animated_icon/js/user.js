let floatIcon = document.getElementById("footerIcon");
let opt = document.querySelectorAll("#footerIcon div span");
let blur = opt[0].innerHTML;
let animation = opt[1].innerHTML;
let del = opt[2].innerHTML;
let dur = opt[3].innerHTML;

if (animation == ' rot+drag '){
    gsap.fromTo(floatIcon,{
        y:-100
    },{
        y:0,
        rotation:360,
        duration : dur,
        delay:del
    })
}else if(animation ==' op+drag '){
    gsap.fromTo(floatIcon,{
        y:-100,
        opacity:0
    },{
        y:0,
        opacity:1,
        duration : dur,
        delay:del
    })
}else if(animation==" none "){

}else if(animation==' elastic '){
    gsap.fromTo(floatIcon,{
        y:-100
    },{
        y:0,
        ease:"elastic.out(1, 0.3)",
        duration : dur,
        delay:del
    })
}else if(animation ==' back '){
    gsap.fromTo(floatIcon,{
        y:-100
    },{
        y:0,
        ease: "back.out(1.7)",
        duration : dur,
        delay:del
    })
}else{
    gsap.fromTo(floatIcon,{
        y:-100
    },{
        y:0,
        ease: "bounce.out",
        duration : dur,
        delay:del
    })
};

if (blur == 1){
    floatIcon.classList.add("blurring");
}