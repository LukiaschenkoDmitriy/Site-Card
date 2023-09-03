import "./styles/index/home.scss";
import './styles/index/resume.scss';
import './styles/index/about.scss';
import "./styles/index/skills.scss";
import "./styles/index/languages.scss";

import { scrollIntoViewBy } from "./project";

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

homeJavaScript();
skillsHeaderFunction();