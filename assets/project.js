export function scrollIntoViewBy(nameElement, nameButton) {
    $(nameButton).on("click", function() {
        let elementOffset = $(nameElement).offset();

        window.scrollTo({
            top: elementOffset.top - 50,
            behavior: 'smooth'
        })
    });
}