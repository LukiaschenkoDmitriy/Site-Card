import "./styles/home.scss";
import './styles/resume.scss';
import './styles/about.scss';
import "./styles/skills.scss";

import { scrollIntoViewBy } from "../function";

function homeJavaScript() {
    hljs.highlightAll()
};

function skillsHeaderFunction() {
    let languageNames = ["csharp", "python", "php", "typescript", "nodejs"];
    languageNames.forEach(name => {
        scrollIntoViewBy(".skill-"+name, ".skill-"+name+"-button", -120);
    });
}

function headerFunctions() {
    let main_href = window.location.href.split("/");
    main_href = main_href[0]+"//"+main_href[1]+main_href[2];

    $('.portf_button').on("click", function() {
        window.location.replace(main_href);
    })

    scrollIntoViewBy("#home", ".head-home-button");
    scrollIntoViewBy("#chapter-title-about-me", ".head-about-me-button");
    scrollIntoViewBy("#chapter-title-resume", ".head-resume-button");
    scrollIntoViewBy("#chapter-title-skills", ".head-skills-button");
    scrollIntoViewBy(".wrapp-contact-container", ".head-contacts-button");
}

homeJavaScript();
headerFunctions();
skillsHeaderFunction();