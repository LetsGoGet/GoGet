const formElement = document.getElementById('bbp_topic_submit');

formElement.addEventListener('click', function originalSubmitButtonClick(e) {
    if (jQuery('#new-post').valid()) {
        e.target.disabled = true;
        showInterviewExperienceInput();
    }
});

