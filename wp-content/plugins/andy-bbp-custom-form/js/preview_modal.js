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
    jQuery('#new-post').submit(); // Submit event should be fired by jQuery, otherwise the jQuery validator will not be triggered.
};

function displayPreview(arr) {
    const [company_name, job_property, job_category, job_title, industry, sub_industry, isAnon, author_bg, interview_date, interview_loc, 
           difficulty, interview_result, interview_type, preparation, interview_flow, feedback, tags] = arr;

    var result = '<div style="margin-top: -12px; padding-top: 20px; padding-left: 40px; padding-right: 40px; padding-bottom: 18px; \
                    background: linear-gradient(#0A2D87 7.8%, white 0%);">';
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
    result += '<h6 class="check_result">作者背景</h6>' + author_bg;
    result += '<h6 class="check_result">面試時間</h6>' + interview_date;
    result += '<h6 class="check_result">職缺地點</h6>' + interview_loc;
    result += '<h6 class="check_result">面試難度</h6>' + difficulty;
    result += '<h6 class="check_result">面試結果</h6>' + interview_result;
    result += '<h6 class="check_result">面試項目</h6>' + interview_type;
    result += '<hr style="height:0.8px;background-color:gray;">';
    result += '<h6 class="check_result">準備過程</h6>' + preparation;
    result += '<h6 class="check_result">面試過程</h6>' + interview_flow;
    result += '<h6 class="check_result">心得建議</h6>' + feedback;
    result += '<br><br>';
    result += tags;
    var btns = '<div style="text-align: right;"><button id="modal_cancel" type="button" onclick="cancelClicked()" style="color: white; \
                background-color: red; border-color: red; margin-top: 28px; bottom: 10px; margin-right: 25px;">上一步</button> \
                <button id="modal_submit" type="button" onclick="submitClicked()" style="color: white; background-color: #1F3372; \
                margin-top: 28px; bottom: 10px;">確認發佈</button> </div>';
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

// function show_all_components() {
//     console.log('0', document.getElementById('$componentIDs[0]'));
//     console.log('1', document.getElementById('$componentIDs[1]'));
//     console.log('2', document.getElementById('$componentIDs[2]'));
//     console.log('3', document.getElementById('$componentIDs[3]'));
//     console.log('4', document.getElementById('$componentIDs[4]'));
//     console.log('5', document.getElementById('$componentIDs[5]'));
//     console.log('6', document.getElementById('$componentIDs[6]'));
//     console.log('7', document.getElementById('$componentIDs[7]'));
//     console.log('8', document.getElementById('$componentIDs[8]'));
//     console.log('9', document.getElementById('$componentIDs[9]'));
//     console.log('10', document.getElementById('$componentIDs[10]'));
//     console.log('11', document.getElementById('$componentIDs[11]'));
//     console.log('12', document.getElementById('$componentIDs[12]'));
//     console.log('13', document.getElementById('$componentIDs[13]'));
//     console.log('14', document.getElementById('$componentIDs[14]'));
//     console.log('15', document.getElementById('$componentIDs[15]'));
//     console.log('16', document.getElementById('$componentIDs[16]'));
// }

