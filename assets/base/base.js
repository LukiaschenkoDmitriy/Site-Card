/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import "./styles/base.scss";
import "./styles/contact.scss";
import "./styles/header.scss";

import { scrollIntoViewBy } from "../function";

function headerResponsive() {
    $('.nav_button').on('click', function() {
        var sub_container = $(".sub_head_container_nav");
    
        if (sub_container.css('display') == 'none') sub_container.css('display', 'grid');
        else sub_container.css('display', 'none');
    });
    
    function maxWidth(x) {
        $(".sub_head_container_nav").css('display', 'none');
    }
    
    var x = window.matchMedia("(max-width: 600px)");
    x.addListener(maxWidth);
}

function headerFunctions() {
    $('.portf_button').on("click", function() {
        window.location.replace("");
    })

    scrollIntoViewBy("#home", ".head-home-button");
    scrollIntoViewBy("#chapter-title-about-me", ".head-about-me-button");
    scrollIntoViewBy("#chapter-title-resume", ".head-resume-button");
    scrollIntoViewBy("#chapter-title-skills", ".head-skills-button");
    scrollIntoViewBy(".wrapp-contact-container", ".head-contacts-button");
}

function headerScrollTrigger() {
    addEventListener("scroll", function() {
        var doc = document.documentElement;
        var top = (window.pageYOffset || doc.scrollTop)  - (doc.clientTop || 0);
        
        if (top > 250) {
            $(".header_container").css("background-color", "rgba(1,22,39, 1)");
        } else {
            $(".header_container").css("background-color", "rgba(1,22,39, 0");
        }
    })
}

headerScrollTrigger();
headerFunctions();
headerResponsive();