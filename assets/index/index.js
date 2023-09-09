import "./styles/home.scss";
import './styles/resume.scss';
import './styles/about.scss';
import "./styles/skills.scss";

import { scrollIntoViewBy } from "../function";

function homeJavaScript() {
    hljs.highlightAll()
};

function skillsHeaderFunction() {
    let languageNames = ["csharp", "python", "php", "nodejs"];
    languageNames.forEach(name => {
        scrollIntoViewBy(".skill-"+name, ".skill-"+name+"-button", -120);
    });
}

var currentBox = 0;
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

function skillFuncitons() {
    var buttons = $(".skill-button");
    var skills = $(".skill-container > .skill");

    for (let index = 0; index < buttons.length; index++) {
        $(skills[index]).attr("class", "skill-no-active")
        
        $(buttons[index]).on("click", () => {
            $(".skill-button-active").attr("class", "skill-button");
            $(buttons[index]).attr("class", "skill-button-active");

            $(".skill-container > .skill").attr("class", "skill-no-active");
            $(skills[index]).attr("class", "skill");
        })
    }

    $(buttons[0]).attr("class", "skill-button-active");
    $(skills[0]).attr("class", "skill");
}

function contactFunctions() {
    let contacts = $(".contact");
    let nameContainers = $(".contact > a > div");

    // contacts.length == nameContainers.length

    for (let index = 0; index < contacts.length; index++) {
        $(contacts[index]).on("mouseover", () => {
            $(nameContainers[index]).css("width", "125px");
        })

        $(contacts[index]).on("mouseleave", () => {
            $(nameContainers[index]).css("width", "0px");
        })
    }
}

scrollContent();
homeJavaScript();
skillsHeaderFunction();
skillFuncitons();
contactFunctions();