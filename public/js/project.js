
let components_name = {
    '#project_id_checkbox': "#project_id",
    '#project_name_checkbox': '#project_name',
    '#project_language_checkbox': '#project_language',
    '#project_gitPath_checkbox' : '#project_gitPath',
    '#project_description_checkbox': '#project_description'
}

for (const [key, value] of Object.entries(components_name)) {
    $(key).on("change", function() {
        if ($(key).is(':checked')) {
            $(value).removeAttr("disabled");
        } else {
            $(value).attr('disabled', true);
        }
    })
  }