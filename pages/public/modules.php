<?php require('register.php'); ?>
<?php require('chats.php'); ?>
<?php require('login.php'); ?>
<?php require("./requests/config.php"); ?>
<style>
    .custom-file-style {
        /* border: 1px solid lightgray; */
        width: 100%;
        border: 1px solid lightgray;
        border-radius: 2px;
        display: inline-block;
        padding: 20px;
        background-color: white;
        box-shadow: 2px 2px 2px darkgray;
    }
    .custom-file-style:hover {
        margin-top: -5px;
        margin-bottom: 5px;
        transition: .3s;
    }
    
    .custom-file-style:not(:hover) {
        margin-top: 0;
        margin-bottom: 0;
        transition: .3s;
    }
</style>
<div class="container-fluid" style="margin-top: 30px; margin-bottom: 40px">
    <!-- <div class="page-header" style="background: url('./assets/images/background/gradient.png') no-repeat;"> -->
    <div class="reviewer-header" style="">        
        <div class="container-fluid"> <div class="row">
          	 <div class="card">
                <div class="card-body">
                  <h3 class="card-title text-center"> LIST OF MODULES </h3>
                  <div class="table-responsive">
                    <table
                      id="datatable"
                      class="table table-bordered"
                    >
                      <thead>
                        <tr>
                          <th class="bg-primary text-white">File Name</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $ret="SELECT * FROM `modules`"; 
                          $stmt= $mysqli->prepare($ret) ;
                          $stmt->execute() ;//ok
                          $res=$stmt->get_result();
                          
                          while($row = $res->fetch_object()):
                        ?>
                        <tr>
                            <td class="text-uppercase">
                                <a href="uploads/modules/<?php echo $row->file_name ?>"  class="custom-file-style text-primary" target="_blank" title="Preview Document">
                                    <i class="fa fa-file"></i> &nbsp; &nbsp; &nbsp; <?php echo $row->file_title ?>
                                    <br>
                                    &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; <small class="text-muted">Date added: <?php echo date_format(date_create($row->created_at), "M d, Y h:i A") ?></small>
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                      </tbody>
                     
                    </table>
                  </div>
                </div>
              </div>
          </div> <!-- ROW end -->
        </div>
    </div>
</div>