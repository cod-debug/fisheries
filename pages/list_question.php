<?php require("./requests/config.php"); ?>
<div class="container-fluid">
  <div class="card">
    <div class="card-header">Filter Questions</div>
    <div class="card-body">
      <form method="POST">
        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <label>Type of Test</label>
              <select name="type_of_test" class="form-control">
                <option value="">All</option>
                <option value="pre">Pretest</option>
                <option value="post">Post Test</option>
              </select>
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label>CATEGORY: </label>
              <select name="qs_category" class="form-select">
                <option value="" selected>All</option>
                <?php
                  $cat="SELECT * FROM `categories` WHERE `cat_status` != 'deleted'"; 
                  $c= $mysqli->prepare($cat) ;
                  $c->execute() ;//ok
                  $c_res=$c->get_result(); 
                  while($cate = $c_res->fetch_object()):
                ?>
                  <option value="<?php echo $cate->cat_id ?>"><?php echo $cate->cat_name ?></option>
                <?php endwhile; ?>
              </select>
            </div>
          </div>
          
          <div class="col-md-2">
            <div class="form-group">
              <label class="hidden">.</label>
              <button class="btn btn-primary w-100" name="filter">Filter</button>
            </div>
          </div>
        </div>
      </form>
    </div>
    
  </div>

  <div class="card shadow-2">
    <div class="card-header">
      List of Questions
    </div>
    <div class="card-body">
      <table class="table" id="datatable">
        <thead>
          <tr>
            <th class="bg-primary text-white">Question</th>
            <th class="bg-primary text-white">Type of Test</th>
            <th class="bg-primary text-white">Category</th>
            <th class="bg-primary text-white">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
            $ret="SELECT * FROM `questions` LEFT JOIN `categories` on `questions`.`qs_category` = `categories`.`cat_id` WHERE `qs_category` AND `questions`.`qs_status` != 'deleted'"; 

            if(isset($_POST['filter'])){
              extract($_POST);
              if($qs_category != ''){
                $ret="SELECT * FROM `questions` 
                LEFT JOIN `categories` on `questions`.`qs_category` = `categories`.`cat_id` 
                WHERE `questions`.`qs_category` = '$qs_category'"; 
              } 

              if($type_of_test != ''){
                $ret="SELECT * FROM `questions` 
                LEFT JOIN `categories` on `questions`.`qs_category` = `categories`.`cat_id` 
                WHERE `questions`.`type_of_test` = '$type_of_test'"; 
              } 

              if($qs_category != '' && $type_of_test != ''){
                $ret="SELECT * FROM `questions` 
                LEFT JOIN `categories` on `questions`.`qs_category` = `categories`.`cat_id` 
                WHERE `questions`.`qs_category` = '$qs_category'
                AND `questions`.`type_of_test` = '$type_of_test'"; 
              }
            }

            $stmt= $mysqli->prepare($ret) ;
            $stmt->execute() ;//ok
            $res=$stmt->get_result();
            
            while($row = $res->fetch_object()):
          ?>
            <tr>
              <td>
                <?php echo $row->qs_title ?>
              </td>
              <td class="text-uppercase">
                <?php echo $row->type_of_test == "pre" ?  $row->type_of_test : $row->type_of_test." "  ?>test
              </td>
              <td class="text-uppercase">
                <?php echo $row->cat_name?>
              </td>
              <td>
                <a class="btn btn-success text-white" href="index.php?link=updatequestion&id=<?php echo $row->qs_id ?>" title="EDIT QUESTION"><i class="fa fa-edit"></i> UPDATE</a>
                <a class="btn btn-danger" href="index.php?link=updatequestion&id=<?php echo $row->qs_id ?>&delete=1" title="DELETE QUESTION"><i class="fa fa-edit"></i> DELETE</a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>