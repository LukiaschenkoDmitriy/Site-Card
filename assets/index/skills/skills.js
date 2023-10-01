import anime from "animejs";
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);
let skillAnimation = anime({
    targets: ".skill-choise > div",
    translateY: ["100px", "0px"],
    opacity: ["0%", "100%"],
    delay: 0,
    duration: (div, i, l) => (i+1)*1000,
    autoplay: false
})

let skillDescriptionAnimation = anime({
    targets: ".skill-container > div",
    translateY: ["100px", "0px"],
    opacity: ["0%", "100%"],
    delay: 0,
    duration: (div, i, l) => (i+1)*1000,
    autoplay: false
})

function skillFuncitons() {
    var buttons = $(".skill-button");
    var skills = $(".skill-container > .skill");
    var preview = $(".skill-container")

    for (let index = 0; index < buttons.length; index++) {
        $(skills[index]).attr("class", "skill-no-active")
        
        $(buttons[index]).on("click", () => {
            $(".skill-button-active").attr("class", "skill-button");
            $(buttons[index]).attr("class", "skill-button-active");

            window.scrollTo({
                top: preview.offset().top,
                behavior: 'smooth'
            })

            $(".skill-container > .skill").attr("class", "skill-no-active");
            $(skills[index]).attr("class", "skill");
        })
    }

    $(buttons[0]).attr("class", "skill-button-active");
    $(skills[0]).attr("class", "skill");
}


export function skillsInit() {
    skillFuncitons();

    ScrollTrigger.create({
        trigger: ".skills-container",
        start: "top center",
        end: "bottom center",
        onEnter: function() {
            skillAnimation.direction = "normal";

            skillAnimation.play();
        },
        onEnterBack: function() {
            skillAnimation.direction = "normal";

            skillAnimation.play();
        },
    });

    ScrollTrigger.create({
        trigger: "skill-container",
        start: "top center",
        end: "bottom center",
        onEnter: () => {
            skillDescriptionAnimation.direction = "normal";

            skillDescriptionAnimation.play(); 
        },
        onEnterBack: () => {
            skillDescriptionAnimation.direction = "reverse";

            skillDescriptionAnimation.play(); 
        }
    })
}