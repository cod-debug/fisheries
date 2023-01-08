
    
<script>
    $("#updateQues").on("submit", (e) => {
        e.preventDefault();
        let add_on = 1;
        let qs_title = e.target[1].value;
        let type_of_test = e.target[2].value;
        let qs_category = e.target[3].value;

        let qs_subtitle = e.target[3 + add_on].value;
        
        let choice_1 = e.target[4 + add_on].value;
        let choice_1_a = e.target[5 + add_on].checked;
        let choice_1_id = parseInt(e.target[5 + add_on].dataset.ansId);
        
        let choice_2 = e.target[6 + add_on].value;
        let choice_2_a = e.target[7 + add_on].checked;
        let choice_2_id = parseInt(e.target[7 + add_on].dataset.ansId);

        let choice_3 = e.target[8 + add_on].value;
        let choice_3_a = e.target[9 + add_on].checked;
        let choice_3_id = parseInt(e.target[9 + add_on].dataset.ansId);

        let choice_4 = e.target[10 + add_on].value;
        let choice_4_a = e.target[11 + add_on].checked;
        let choice_4_id = parseInt(e.target[11 + add_on].dataset.ansId);

        let qs_id = parseInt(e.target[12 + add_on].value);

        let payload = {
            qs_id: qs_id,
            qs_title: qs_title,
            type_of_test: type_of_test,
            qs_subtitle: qs_subtitle,
            qs_category: qs_category,
            choices: [
                {
                    value: choice_1,
                    is_correct: choice_1_a,
                    id: choice_1_id
                },
                {
                    value: choice_2,
                    is_correct: choice_2_a,
                    id: choice_2_id
                },
                {
                    value: choice_3,
                    is_correct: choice_3_a,
                    id: choice_3_id
                },
                {
                    value: choice_4,
                    is_correct: choice_4_a,
                    id: choice_4_id
                },
            ]
        }
        
        let endpoint = `/fisheries/requests/update-question.php`;

        Swal.fire({
            title: 'Are you sure you want to submit?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: (login) => {
                return fetch(endpoint, {
                    method: "POST",
                    headers: {
                    'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(payload)
                })
                .then(response => {
                    if (!response.ok) {
                    throw new Error(response.statusText)
                    }
                    return response.json()
                })
                .catch(error => {
                    Swal.showValidationMessage(
                    `Request failed: ${error}`
                    )
                })
            },
            allowOutsideClick: () => !Swal.isLoading()
            }).then(({value}) => {
                if(value.code == 200){
                    Swal.fire({
                        title: value.message,
                        icon: "success",
                    }).then(() => {
                        // window.location.href="/fisheries/index.php?link=listquestion";
                    })
                } else {
                    Swal.fire({
                        title: value.message,
                        icon: "error",
                    })
                }
        })
    });
</script>