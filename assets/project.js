export function scrollIntoViewBy(nameElement, nameButton, offset = -50) {
    $(nameButton).on("click", function() {
        let elementOffset = $(nameElement).offset();

        window.scrollTo({
            top: elementOffset.top + offset,
            behavior: 'smooth'
        })
    });
}