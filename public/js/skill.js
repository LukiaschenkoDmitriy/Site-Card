
let components_name = {
    '#skill_id_checkbox': "#skill_id",
    '#skill_name_checkbox': '#skill_name',
    '#skill_duration_checkbox': '#skill_duration',
    '#skill_project_language_checkbox' : '#skill_project_languages',
    '#skill_rate_checkbox': '#skill_rate'
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