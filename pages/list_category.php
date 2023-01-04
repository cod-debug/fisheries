<?php require("./requests/config.php"); ?>
<div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">

          	 <div class="card">
                <div class="card-body">
                  <h5 class="card-title"> LIST OF CATEGORIES </h5>
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                          <th class="bg-primary text-white">Category Title</th>
                          <th class="bg-primary text-white">Category Description</th>
                          <th class="bg-primary text-white">Status</th>
                          <th class="bg-primary text-white"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $ret="SELECT * FROM `categories`"; 
                          $stmt= $mysqli->prepare($ret) ;
                          $stmt->execute() ;//ok
                          $res=$stmt->get_result();
                          
                          while($row = $res->fetch_object()):
                            switch($row->cat_status){
                              case "active":
                                $badge = "badge rounded-pill bg-success";
                                break;
                              case "inactive":
                                $badge = "badge rounded-pill bg-muted";
                                break;
                            }
                        ?>
                        <tr>
                            <td><?php echo $row->cat_name ?></td>
                            <td><?php echo $row->cat_desc ?></td>
                            <td><span class="<?php echo $badge ?>"><?php echo $row->cat_status ?></span></td>
                            <td>
                              
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