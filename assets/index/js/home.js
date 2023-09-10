function homeJavaScript() {
    hljs.highlightAll()
};

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
}

export function homeInit() {
    homeJavaScript();
    contactFunctions();
    scrollContent();
}