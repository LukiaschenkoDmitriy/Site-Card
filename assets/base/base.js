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

headerResponsive();