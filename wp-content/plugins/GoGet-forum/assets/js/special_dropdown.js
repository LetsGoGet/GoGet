function setSpecialDropdown(target_id, correspond_id, correspond_value) {
    document.getElementById(target_id).addEventListener('change', (e) => {
        if (e.target.value != '') {
            content = "";
            correspond_value[document.getElementById(target_id).value].map(e => {
                content = content + "<option value='" + e + "'>" + e + "</option>";
            });
            document.getElementById(correspond_id).innerHTML = content;
            return;
        }
    });
}