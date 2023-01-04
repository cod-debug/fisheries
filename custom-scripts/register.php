
    
<script>
    $("#registerForm").on("submit", (e) => {
        e.preventDefault();
        let input_starts_in = 1; // STUDENT ID
        let student_id_num = e.target[input_starts_in].value;
        let fname = e.target[input_starts_in + 1].value;
        let mname = e.target[input_starts_in + 2].value;
        let lname = e.target[input_starts_in + 3].value;
        let phone = e.target[input_starts_in + 4].value;
        let email = e.target[input_starts_in + 5].value;
        let password = e.target[input_starts_in + 6].value;

        let payload = {
            student_id_num: student_id_num,
            fname: fname,
            mname: mname,
            lname: lname,
            phone: phone,
            email: email,
            password: password,
        }

        let endpoint = `/fisheries/requests/register.php`;

        Swal.fire({
            title: 'Are you sure you want to submit?',
            content: "",
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
                        title: "Successfully saved",
                        icon: "success",
                    }).then(() => {
                        // window.location.href="/fisheries/index.php?link=listcategory";
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