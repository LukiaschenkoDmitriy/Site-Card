$('.nav_button').on('click', function() {
    var sub_container = $(".sub_head_container_nav");

    if (sub_container.css('display') == 'none') sub_container.css('display', 'grid');
    else sub_container.css('display', 'none');
});

function maxWidth(x) {
    $(".sub_head_container_nav").css('display', 'none');
}

x.addListener(window.matchMedia("(max-width: 600px)"))