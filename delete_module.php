<?php require("./requests/config.php"); ?>
<?php include("script.php"); ?>
<body>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $delete_mod = "DELETE FROM `modules` WHERE `file_id` = $id";
        $del = $mysqli->prepare($delete_mod);

        if($del->execute()){
            $succ = "Successfully deleted module.";
        } else {
            $succ = "Something went wrong.";
        }
    }
?>

    <?php
        if(isset($err)):
    ?>
        <script>
            Swal.fire({
                title: 'Error',
                text: "Something went wrong.",
                theme: 'modern',
                icon: 'error',
            }).then(() => {
                window.location.href= "index.php?link=listmodule";
            })
        </script>
    <?php
        endif;
    ?>

    <?php if(isset($succ)): ?>
       <script>
            Swal.fire({
                title: 'Success!',
                text: "Successfully deleted.",
                theme: 'modern',
                icon: 'success',
            }).then(() => {
                window.location.href= "index.php?link=listmodule";
            })
        </script>
    <?php endif; ?>
</body>