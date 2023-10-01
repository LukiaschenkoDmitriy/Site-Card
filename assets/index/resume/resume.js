import anime from "animejs";
import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);
let educationAnimation = anime({
    targets: ".resume-description",
    translateY: ["-100px", "0px"],
    opacity: ["0%", "100%"],
    delay: 0,
    duration: (div, i, l) => (i+1)*1000,
    autoplay: false
})

let skillsLanguagesAnimation = anime({
    targets: ".resume-chapter",
    translateY: ["-100px", "0px"],
    opacity: ["0%", "100%"],
    delay: 0,
    duration: (dev, i ,l) => (i+1) * 1000,
    autoplay: false
})

export function resumeInit() {
    ScrollTrigger.create({
        trigger: ".resume-container",
        start: "top center",
        end: "bottom center",
        onEnter: function() {
            educationAnimation.direction = "normal";
            skillsLanguagesAnimation.direction = "normal";

            educationAnimation.play();
            skillsLanguagesAnimation.play();
        },
        onEnterBack: function() {
            educationAnimation.direction = "normal";
            skillsLanguagesAnimation.direction = "normal";

            educationAnimation.play();
            skillsLanguagesAnimation.play();
        },
    });
}