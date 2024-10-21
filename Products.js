
             /*----First Card----*/
let circle = document.querySelector(".color-option");

circle.addEventListener("click", (e) => {
    let target = e.target;
    if (target.classList.contains("circle")) {
        circle.querySelector(".active").classList.remove("active");
        target.classList.add("active");
        document.querySelector(".main-images .active").classList.remove("active");
        document.querySelector(`.main-images .${target.id}`).classList.add("active");
        
    }
});


               /*----seconed Card----*/
let circle1 = document.querySelector(".color-option1");

circle1.addEventListener("click", (e1) => {
    let target1 = e1.target;
    if (target1.classList.contains("circle1")) {
        circle1.querySelector(".active").classList.remove("active");
        target1.classList.add("active");
        document.querySelector(".main-images1 .active").classList.remove("active");
        document.querySelector(`.main-images1 .${target1.id}`).classList.add("active");
    }
});

           
               /*----third Card----*/
let circle2 = document.querySelector(".color-option2");

circle2.addEventListener("click", (e2) => {
    let target2 = e2.target;
    if (target2.classList.contains("circle2")) {
        circle2.querySelector(".active").classList.remove("active");
        target2.classList.add("active");
        document.querySelector(".main-images2 .active").classList.remove("active");
        document.querySelector(`.main-images2 .${target2.id}`).classList.add("active");
    }
});

               /*----Fourth Card----*/
let circle3 = document.querySelector(".color-option3");

circle3.addEventListener("click", (e3) => {
    let target3 = e3.target;
    if (target3.classList.contains("circle3")) {
        circle3.querySelector(".active").classList.remove("active");
        target3.classList.add("active");
        document.querySelector(".main-images3 .active").classList.remove("active");
        document.querySelector(`.main-images3 .${target3.id}`).classList.add("active");
    }
});


               /*----Fifth Card----*/
let circle4 = document.querySelector(".color-option4");

circle4.addEventListener("click", (e4) => {
    let target4 = e4.target;
    if (target4.classList.contains("circle4")) {
        circle4.querySelector(".active").classList.remove("active");
        target4.classList.add("active");
        document.querySelector(".main-images4 .active").classList.remove("active");
        document.querySelector(`.main-images4 .${target4.id}`).classList.add("active");
    }
});


               /*----Sixth Card----*/
let circle5 = document.querySelector(".color-option5");

circle5.addEventListener("click", (e5) => {
    let target5 = e5.target;
    if (target5.classList.contains("circle5")) {
        circle5.querySelector(".active").classList.remove("active");
        target5.classList.add("active");
        document.querySelector(".main-images5 .active").classList.remove("active");
        document.querySelector(`.main-images5 .${target5.id}`).classList.add("active");
    }
});


               /*----7 Card----*/
let circle6 = document.querySelector(".color-option6");

circle6.addEventListener("click", (e6) => {
    let target6 = e6.target;
    if (target6.classList.contains("circle6")) {
        circle6.querySelector(".active").classList.remove("active");
        target6.classList.add("active");
        document.querySelector(".main-images6 .active").classList.remove("active");
        document.querySelector(`.main-images6 .${target6.id}`).classList.add("active");
    }
});


               /*----7 Card----*/
let circle7 = document.querySelector(".color-option7");

circle7.addEventListener("click", (e7) => {
    let target7 = e7.target;
    if (target7.classList.contains("circle7")) {
        circle7.querySelector(".active").classList.remove("active");
        target7.classList.add("active");
        document.querySelector(".main-images7 .active").classList.remove("active");
        document.querySelector(`.main-images7 .${target7.id}`).classList.add("active");
    }
});