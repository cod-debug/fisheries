
    
<script>
    $("#addCat").on("submit", (e) => {
        e.preventDefault();
        let cat_name = e.target[0].value;
        let cat_aka = e.target[1].value;
        let cat_desc = e.target[2].value;
        let cat_id = e.target[3].value;

        let payload = {
            cat_name: cat_name,
            cat_aka: cat_aka,
            cat_desc: cat_desc,
            cat_id: cat_id
        }

        let endpoint = `/fisheries/requests/update-category.php`;

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
                        window.location.href="/fisheries/index.php?link=listcategory";
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