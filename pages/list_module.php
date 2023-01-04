<?php require("./requests/config.php"); ?>
<div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">

          	 <div class="card">
                <div class="card-body">
                  <h5 class="card-title"> LIST OF MODULES </h5>
                  <div class="table-responsive">
                    <table
                      id="datatable"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                          <th class="bg-primary text-white">Name</th>
                          <th class="bg-primary text-white">Actions</th>
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
                            <td class="text-uppercase"><?php echo $row->file_title ?></td>
                            <td>
                                <a href="uploads/modules/<?php echo $row->file_name ?>" class="btn btn-primary" target="_blank"><i class="fa fa-eye"></i> PREVIEW FILE</a>
                                <a href="delete_module.php?id=<?php echo $row->file_id ?>" class="btn btn-danger"><i class="fa fa-trash"></i> DELETE MODULE</a>
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