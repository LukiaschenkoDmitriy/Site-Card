import anime from "animejs";
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger)
let imageAnimation = anime({
    targets: ".about-container > img",
    translateX: ["-100px", "0px"],
    opacity: ["0%", "100%"],
    delay: 0,
    duration: 2000,
    autoplay: false
});

let textAnimation = anime({
    targets: ".about-container > div > div",
    translateX: ["50px", "0px"],
    opacity: ["0%", "100%"],
    delay: 0,
    duration: function(div, i, l) {
        return (i+1)*500;
    },
    autoplay: false
})

export function aboutInit() {
    ScrollTrigger.create({
        trigger: ".about-container",
        start: "top center",
        end: "bottom center",
        onEnter: function() {
            imageAnimation.direction = "normal";
            textAnimation.direction = "normal";

            imageAnimation.play();
            textAnimation.play();
        },
        onLeave: function() {
            imageAnimation.direction = "reverse";
            textAnimation.direction = "reverse";

            imageAnimation.play();
            textAnimation.play();
        },
        onEnterBack: function() {
            imageAnimation.direction = "normal";
            textAnimation.direction = "normal";

            imageAnimation.play();
            textAnimation.play();
        },
    });
}