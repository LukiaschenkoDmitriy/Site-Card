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

homeJavaScript();
skillsHeaderFunction();