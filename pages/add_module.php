<?php require("./requests/config.php"); ?>
<?php
    if(isset($_POST['upload_module'])){
        
        $target_dir = "uploads/modules/";
        $target_file = $target_dir . basename($_FILES["file_name"]["name"]);
        $file_name = basename($_FILES["file_name"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowedTypes = ['pdf'];
        move_uploaded_file($_FILES["file_name"]["tmp_name"], $target_file);

        $title = $_POST["file_title"];

        
        $unique = "SELECT * FROM `modules` WHERE `file_title` ='$title'";
        $unq = $mysqli->prepare($unique);
        $unq->execute();
        $res=$unq->get_result();

        
        if($res->num_rows == 1){
            $err = "Duplicate Module";
        } else {
            $insert = "INSERT INTO `modules` (`file_title`, `file_name`) VALUES ('$title', '$file_name')";
            $ins = $mysqli->prepare($insert);
            if($ins->execute()) {
                $succ = "Successfully added module.";
            } else {
                $err = "Something went wrong.";
            }
            
        }
    }
?>
<?php
    if(isset($err)){
        echo "<script>
            Swal.fire({
                title: 'Error',
                text: '$err',
                theme: 'modern',
                icon: 'error',
            })
        </script>";
    }

    if(isset($succ)){
        echo "<script>
            Swal.fire({
                title: 'Success!',
                text: '$succ',
                theme: 'modern',
                icon: 'success',
            })
        </script>";
    }
?>
<div class="container-fluid">
    <div class="row">
    <div class="col-md-8">
        <div class="card">
        <form class="form-horizontal" method="POST"  enctype="multipart/form-data">
            <div class="card-body">
            <h4 class="card-title">ADD MODULE</h4> <br><br>
            <div class="form-group row">
                <label
                for="title"
                class="col-sm-3 text-end control-label col-form-label"
                >File Name: </label> 
                <div class="col-sm-9">
                <input
                    type="text"
                    class="form-control"
                    name="file_title"
                    required
                    id="title"/>
                </div>
            </div>
            <div class="form-group row">
                <label
                for="aka"
                class="col-sm-3 text-end control-label col-form-label"
                >File: </label> 
                <div class="col-sm-9">
                <input
                    type="file"
                    class="form-control"
                    id="aka"
                    name="file_name"
                    accept=".pdf"
                    required
                    placeholder=""/>
                </div>
            </div>
            </div>
            <div class="border-top"></div>
            <div class="card-body" style="text-align: right;">
                <button type="submit" name="upload_module" class="btn btn-primary">
                    <i class="fa fa-paper-plane"></i> Submit
                </button>
            </div>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
</div>