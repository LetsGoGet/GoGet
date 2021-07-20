function setLocationDropdown(target_id, correspond_id, target_value, correspond_value) {
    document.getElementById(target_id).addEventListener('change', (e) => {
        if (e.target.value != '') {
            if (e.target.value === target_value) {
                content = "";
                correspond_value[target_value].map(e => {
                    content = content + "<option value='" + e + "'>" + e + "</option>";
                });
                document.getElementById(correspond_id).innerHTML = content;
                return;
            } else {
                document.getElementById(correspond_id).innerHTML = [];
                return;
            }
        }
    });
}