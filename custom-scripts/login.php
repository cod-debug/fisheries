
    
<script>
    $("#loginForm").on("submit", async (e) => {
        e.preventDefault();
        let email = e.target[1].value;
        let password = e.target[2].value;
        let payload = {
            email: email,
            password: password,
        }

        let endpoint = `/fisheries/requests/login.php`;

        let res =  await fetch(endpoint, {
            method: "POST",
            headers: {
            'Content-Type': 'application/json'
            },
            body: JSON.stringify(payload)
        });
        let {code, message, usertype} = await res.json();
        
        console.log();
        if(code == 200){
            if(usertype == 'admin'){
                window.location.href="/fisheries/index.php";
            } else {
                window.location.href="/fisheries/public.php";
            }
        }
        // return false;
        // Swal.fire({
        //     title: 'Proceed to login?',
        //     content: "",
        //     showCancelButton: true,
        //     confirmButtonText: 'Yes',
        //     showLoaderOnConfirm: true,
        //     preConfirm: (login) => {
        //         return 
        //     },
        //     allowOutsideClick: () => !Swal.isLoading()
        //     }).then(({value}) => {
        //         if(value.code == 200){
        //             Swal.fire({
        //                 title: value.message,
        //                 icon: "success",
        //             }).then(() => {
        //                 if(value.usertype == 'admin'){
        //                     window.location.href="/fisheries/index.php";
        //                 } else {
        //                     window.location.href="/fisheries/public.php";
        //                 }
        //             })
        //         } else {
        //             Swal.fire({
        //                 title: value.message,
        //                 icon: "error",
        //             })
        //         }
        // })
    });
</script>