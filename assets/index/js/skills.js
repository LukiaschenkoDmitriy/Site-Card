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

export function skillsInit() {
    skillFuncitons();
}