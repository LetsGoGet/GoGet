function setSingleSelection(btn_id, selection_id, color) {
    document.getElementById(btn_id).addEventListener('click', function (e) {
        var idx = e.target.dataset.item;

        var btn_cnt = document.getElementById(btn_id).children.length;

        for (i = 0; i < btn_cnt; i++) {
            if (i == idx) {
                document.getElementById(selection_id).children[i * 2].checked = true;
                document.getElementById(btn_id).children[i].style.color = 'white';
                document.getElementById(btn_id).children[i].style.backgroundColor = color[i];
            } else {
                document.getElementById(selection_id).children[i * 2].checked = false;
                document.getElementById(btn_id).children[i].style.color = color[i];
                document.getElementById(btn_id).children[i].style.backgroundColor = 'white';
            }
        }
        e.stopPropagation();
        e.preventDefault();
        e.stopImmediatePropagation();
    });
}