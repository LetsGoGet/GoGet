const formElement = document.getElementById('bbp_topic_submit');

formElement.addEventListener('click', function originalSubmitButtonClick(e) {
    if (jQuery('#new-post').valid()) {
        // Get Quill content
        //getQuillContent(fieldName);

        e.target.disabled = true;
        showInterviewExperienceInput();
    }
});

