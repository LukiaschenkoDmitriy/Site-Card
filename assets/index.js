import "./styles/index/home.scss";
import './styles/index/about.scss';
import "./styles/index/skills.scss";
import "./styles/index/languages.scss";

function homeJavaScript() {
    hljs.highlightAll()
    new TypeIt('.php-code code', {
        speed: 50,
        waitUntilVisible: true
    }).go().pause(1000).exec(function() {
        hljs.highlightAll();
    });
};

window.onload = function() {
    homeJavaScript();
};