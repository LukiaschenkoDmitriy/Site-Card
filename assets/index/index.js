import "./styles/home.scss";
import './styles/resume.scss';
import './styles/about.scss';
import "./styles/skills.scss";

import { scrollIntoViewBy } from "../function";

function homeJavaScript() {
    hljs.highlightAll()
    new TypeIt('.php-code code', {
        speed: 50,
        waitUntilVisible: true
    }).go().pause(1000).exec(function() {
        hljs.highlightAll();
    });
};

function skillsHeaderFunction() {
    let languageNames = ["csharp", "python", "php", "typescript", "nodejs"];
    languageNames.forEach(name => {
        scrollIntoViewBy(".skill-"+name, ".skill-"+name+"-button", -120);
    });
}

function headerFunctions() {
    scrollIntoViewBy("#home", ".head-home-button");
    scrollIntoViewBy("#chapter-title-about-me", ".head-about-me-button");
    scrollIntoViewBy("#chapter-title-resume", ".head-resume-button");
    scrollIntoViewBy("#chapter-title-skills", ".head-skills-button");
    scrollIntoViewBy(".wrapp-contact-container", ".head-contacts-button");
}

homeJavaScript();
headerFunctions();
skillsHeaderFunction();