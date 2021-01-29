const beforeThis = document.getElementById('page');
const modal = document.createElement('div'); 

modal.id = 'modal';
document.body.insertBefore(modal, beforeThis);

function cancelClicked() {
    document.getElementById('page').setAttribute('transition', '');
    document.getElementById('page').style.pointerEvents = '';
    document.getElementById('page').style.filter = '';
    document.getElementById('modal').style.display = 'none';
    document.getElementById('bbp_topic_submit').disabled = false;
};

function submitClicked() {
    jQuery('#new-post').submit();
};

function displayPreview(arr) {
    const [company_name, job_property, job_category, job_title, industry, sub_industry, isAnon, author_bg, interview_date, interview_loc, 
           difficulty, interview_result, interview_type, preparation, interview_flow, feedback, tags] = arr;

    var result = '<div id="preview_modal_nav_bar" style="margin-top: -12px; padding-top: 20px; padding-left: 40px; padding-right: 40px; padding-bottom: 18px; \
                    background: linear-gradient(#0A2D87 121px, white 0px);">';
    var btns = '<div style="text-align: right;"> \
                <button id="modal_cancel" class="preview_modal_cancel_btns" onclick="cancelClicked()" >上一步</button> \
                <button id="modal_submit" class="preview_modal_submit_btns" onclick="submitClicked()" >確認發佈</button> \
                </div>';

    result += '<div style="color: white;"><h3 style="color: white">預覽畫面</h3>';
    result += '<h5 class="check_result" style="color: white">' + company_name + '&nbsp' + job_title + '&nbsp' + '面試心得' + '</h5>';
    result += '</div><br>';
    result += '<h6 class="check_result">公司名稱</h6>' + company_name;
    result += '<h6 class="check_result">職務性質</h6>' + job_property;
    result += '<h6 class="check_result">職務類別</h6>' + job_category;
    result += '<h6 class="check_result">職務名稱</h6>' + job_title;
    result += '<h6 class="check_result">產業類別</h6>' + industry;
    result += '<h6 class="check_result">細分產業類別</h6>' + sub_industry;
    result += '<h6 class="check_result">是否匿名</h6>' + isAnon;
    result += '<h6 class="check_result">作者背景</h6>' + author_bg.replace(/(?:\r\n|\r|\n)/g, '<br>').replace('\t', '    ');
    result += '<h6 class="check_result">面試時間</h6>' + interview_date;
    result += '<h6 class="check_result">職缺地點</h6>' + interview_loc;
    result += '<h6 class="check_result">面試難度</h6>' + difficulty;
    result += '<h6 class="check_result">面試結果</h6>' + interview_result;
    result += '<h6 class="check_result">面試項目</h6>' + interview_type;
    result += '<hr style="height:0.8px;background-color:gray;">';
    result += '<h6 class="check_result">準備過程</h6>' + preparation.replace(/(?:\r\n|\r|\n)/g, '<br>').replace('\t', '    ');
    result += '<h6 class="check_result">面試過程</h6>' + interview_flow.replace(/(?:\r\n|\r|\n)/g, '<br>').replace('\t', '    ');
    result += '<h6 class="check_result">心得建議</h6>' + feedback.replace(/(?:\r\n|\r|\n)/g, '<br>').replace('\t', '    ');
    result += '<br><br>';
    result += tags;
    result += btns;
    result += '</div>';
    result = result.trim();

    var mdl = document.getElementById('modal');
    mdl.innerHTML = '';
    mdl.innerHTML += result;
    mdl.style.display = 'block';
    document.getElementById('page').setAttribute('transition', '.8s filter');
    document.getElementById('page').style.pointerEvents = 'none';
    document.getElementById('page').style.filter = 'blur(1.5px)';
}

function grabValuesInComponentsAndDisplay($comps) {
    var isAnon, difficulty, interview_result, interview_type, tags;

    var company_name = '<text>' + $comps[0].children[0].value + '</text>';
    var job_property = '<text>' + $comps[1].children[0].value + '</text>';
    var job_category = '<text>' + $comps[2].children[0].value + '</text>';
    var job_title = '<text>' + $comps[3].children[1].value + '</text>';
    var industry = '<text>' + $comps[4].children[0].children[0].value + '&nbsp;&nbsp;' + $comps[4].children[1].children[0].value;
    var sub_industry = '<text>' + $comps[5][0].children[0].value + '&nbsp;&nbsp;' + $comps[5][0].children[1].children[0].value;
    for(var i = 0; i < 2; i++) {
        if ($comps[6].children[i].checked)
            isAnon = '<text>' + $comps[6].children[i].value + '</text>';
    }
    var author_bg = '<text>' + $comps[7].nextElementSibling.children[0].children[0].value + '</text>';
    var interview_date = '<text>' + document.getElementById('datepicker').value + '</text>';
    var interview_loc = '<text>' + $comps[9].children[0].children[0].value + '&nbsp;' + $comps[9].children[1].children[0].value + '</text>';

    for(var i = 0; i < 4; i++) {
        if ($comps[10].children[i].checked) {
            var val = $comps[10].children[i].value;
            var bc = 'orange';
            if (i == 0 || i == 1) bc = 'blue';
            else if (i == 3 || i == 4) bc = 'red';
            difficulty = '<button style="margin-top: 5px; margin-bottom: 8px; border-radius: 17px; border-color: ' + bc + '; background-color: ' + bc + '; color: white">' + val + '</button>';
        }
    }

    for(var i = 0; i < 3; i++) {
        if ($comps[11].children[i].checked) {
            var val = $comps[11].children[i].value;
            var bc = 'black';
            if (i == 0) bc = 'blue';
            else if (i == 1) bc = 'red';
            else if (i == 2) bc = 'orange';
            interview_result = '<button style="margin-top: 5px; margin-bottom: 8px; border-radius: 17px; border-color: ' + bc + '; background-color: ' + bc + '; color: white">' + val + '</button>';
        }
    }

    interview_type = '';
    [...$comps[12].children].forEach((ele, idx) => {
        if (idx % 2 == 0 && ele.checked == true){
            interview_type += '<text>' + $comps[12].children[idx].value + ', ';
        }
    });
    interview_type = interview_type.slice(0, -2) + '</text>';
    var preparation = '<text>' + $comps[13].nextElementSibling.children[0].children[0].value + '</text>';
    var interview_flow = '<text>' + $comps[14].nextElementSibling.children[0].children[0].value + '</text>';
    var feedback = '<text>' + $comps[15].nextElementSibling.children[0].children[0].value + '</text>';

    tags = '';
    if ($comps[16].children[0].value != '') {
        var val = $comps[16].children[0].value;
        tags += '<button class="preview_modal_tags">' + val + '</button>';
    }
    if ($comps[16].children[1].value != '') {
        var val = $comps[16].children[1].value;
        tags += '<button class="preview_modal_tags">' + val + '</button>';
    }
    if ($comps[16].children[2].value != '') {
        var val = $comps[16].children[2].value;
        tags += '<button class="preview_modal_tags">' + val + '</button>';
    }

    displayPreview([company_name, job_property, job_category, job_title, industry, sub_industry, isAnon, author_bg, interview_date, interview_loc, difficulty, interview_result, interview_type, preparation, interview_flow, feedback, tags]);
}

