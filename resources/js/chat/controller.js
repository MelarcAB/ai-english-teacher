
$(document).ready(function () {

    const b_generate_exam = $('#b_generate_exam');
    const token = $('meta[name="csrf-token"]').attr('content');
    const loading_spinner = $('#loading-spinner')
    const ta_question = $('#ta_question');
    const b_send_question = $('#b_send_question');
    var responses_container = $('#responses-container');

    var actual_search = $('#actual-search');

    initPage();








    b_generate_exam.click(function () {
        sendPrompt("generate_exam");
    });

    b_send_question.click(function () {
        let question = ta_question.val().trim();
        if (question.length > 0) {
            sendPrompt(question);
            ta_question.val("");
        }
    });



    function initPage() {
        loading_spinner.hide();
    }


    function sendPrompt(action) {

        actual_search.text('"' + action + '"');
        //using axios
        //csrf token
        const URL_API = "/api/prompt"
        const token = $('meta[name="csrf-token"]').attr('content');
        loading_spinner.show();
        addQuestionToContainer(action);
        axios.get(URL_API, {
            params: {
                prompt: action,
            },
            headers: {
                'X-CSRF-TOKEN': token
            }
        })
            .then(function (response) {
                console.log(response);
                loading_spinner.hide();
                manageResponse(response.data);
            })
            .catch(function (error) {
                loading_spinner.hide();
                // console.log(error);
            });

    }

    function manageResponse(response) {
        response = response.choices[0].message;
        let msg_response = (response.content);
        //  console.log(msg_response);
        addResponseToContainer(msg_response);
    }



    function addResponseToContainer(response) {
        let child = '<div class=" mx-auto p-2 rounded-lg shadow-md bg-gray-100 mb-2 max-w-90">' +
            '<p class="text-gray-800"> ' + response + '</p >' +
            ' </div > ';
        responses_container.append(child);
        responses_container();
    }

    function addQuestionToContainer(question) {
        let child = '<div class=" mx-auto p-2 rounded-lg shadow-md bg-blue-300 mb-2 max-w-90">' +
            '<p class="text-gray-800"> ' + question + '</p >' +
            ' </div > ';
        responses_container.append(child);
        responsesContainer();
    }

    //scroll div to bottom
    function responsesContainer() {
        //scroll responses_container to bottom using jquery
        const element = responses_container;
        element.animate({
            scrollTop: element.prop("scrollHeight")
        }, 500);

    }




});
