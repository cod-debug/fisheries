<?php require("./requests/config.php"); ?>
        <style>
          .message-users{
            height: 80vh;
            overflow: auto;
            width: 100%;
            /*background: #D9D9D9;
            border: 2px solid #C5C5C5;*/
            border-radius: 5px;
          }
          .message-content {
            height: 80vh;
            overflow: auto;
            width: 100%;
            border-radius: 5px;
            background: #F8F4F4;
            box-shadow: inset 4px 0px 4px rgba(0, 0, 0, 0.25), inset -4px 0px 4px rgba(0, 0, 0, 0.25), inset 0px -4px 4px rgba(0, 0, 0, 0.25), inset 0px 4px 4px rgba(0, 0, 0, 0.25);
          }
          .message-messages{
            height: 90%;
            overflow: auto;

          }
          .message-reply {
            height: 10%;
            width: 98%;
            margin: 0 1%;
            border-top: 1px solid lightgrey;
          }

          .message-users-item{
            display: flex;
            justify-content: space-between;
            padding: 10px;
            border-radius: 5px;
            background: #F8F4F4;
          }

          .align-self-stretch {
            align-self:stretch;
          }
          .notif-handler {
            padding: 10px;
            color: white;
            border-radius: 2px;
          }
        </style>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card shadow-2">
                <div class="card-header">
                  <h4 class="card-title">CHATS</h4>
                </div>    
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="message-users">
                        <?php 
                          $cat="SELECT * FROM `users` WHERE `user_type` != 'admin'"; 
                          $c= $mysqli->prepare($cat) ;
                          $c->execute() ;//ok
                          $c_res=$c->get_result(); 
                          while($row = $c_res->fetch_object()):
                        ?>
                          <a class="message-users-item justi-self-center text-primary mt-1" href="index.php?link=chats&user_id=<?php echo $row->user_id ?>">
                            <p class="my-auto"><?php echo $row->fname. " ".$row->lname ?></p>
                            <span class="notif-handler bg-primary align-self-stretch ">0</span>
                          </a>

                        <?php endwhile;?>
                      </div>
                    </div>
                    <div class="col-sm-8">
                      <div class="message-content">
                        <?php if(isset($_GET['user_id'])): ?>
                        <div class="message-messages" id="chatMessages">
                          
                        </div>
                        <form method="POST" id="sendReply">
                          <div class="message-reply">
                            <div class="form-group">
                              <div class="input-group mt-2">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Reply</span>
                                </div>
                                <input type="text" id="message" class="form-control" aria-label="Amount (to the nearest dollar)" required>
                                <input type="text" id="from" class="form-control" value="1" hidden aria-label="Amount (to the nearest dollar)" required>
                                <input type="text" id="to" value="<?php echo $_GET['user_id'] ?>" hidden  class="form-control" aria-label="Amount (to the nearest dollar)" required>
                                <div class="input-group-append">
                                  <button class="input-group-text" type="submit"><i class="fa fa-paper-plane"></i> Send</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                        <?php else: ?> 
                          <p class="alert alert-info"><i class="fa fa-exclamation-triangle"></i> Select a student first to view messages.</p>
                        <?php endif; ?> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      