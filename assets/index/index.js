import "./styles/home.scss";
import './styles/resume.scss';
import './styles/about.scss';
import "./styles/skills.scss";

import { scrollIntoViewBy } from "../function";

var currentBox = 0;

function homeJavaScript() {
    hljs.highlightAll()
};

function skillsHeaderFunction() {
    let languageNames = ["csharp", "python", "php", "typescript", "nodejs"];
    languageNames.forEach(name => {
        scrollIntoViewBy(".skill-"+name, ".skill-"+name+"-button", -120);
    });
}

function scrollContent() {
    let scrollContent = document.querySelector(".scroll-content");

    function scrollLeft() {
        scrollContent.scrollBy({
            left: -300,
            behavior: "smooth",
        });
    }

    function scrollRight() {
        scrollContent.scrollBy({
            left: 300,
            behavior: "smooth",
        });
    }

    let buttons = $(".home-scroll-container > img");
    $(buttons[0]).on("click", scrollLeft);
    $(buttons[1]).on("click", scrollRight);
    $(buttons[0]).on("click", () => {
        updateTypeElement("dec");
    });
    $(buttons[1]).on("click", () => {
        updateTypeElement("inc");
    })
}

function updateTypeElement(event) {
    let typeElements = $(".type-element");

    if (event == "inc") {
        if (currentBox + 1 > typeElements.length - 1) return;
        currentBox++;
    }
    else if (event == "dec") {
        if (currentBox - 1 < 0) return;
        currentBox--;
    }
    for (let index = 0; index < typeElements.length; index++) {
        if (index == currentBox) {
            $(typeElements[index]).css("display", "inline");
        } else {
            $(typeElements[index]).css("display", "none");
        }   
    }
}

scrollContent();
homeJavaScript();
skillsHeaderFunction();