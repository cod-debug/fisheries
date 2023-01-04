<?php include('styles/chats.php'); ?>
<?php require("./requests/config.php"); ?>
<?php if(isset($_SESSION['c_id'])): ?>
<section class="chatbox js-chatbox" style="z-index: 3000;">
  <div class="chatbox__header">
    <h3 class="chatbox__header-cta-text"><span class="chatbox__header-cta-icon"><i
                  class="fas fa-comments"></i></span>Let's chat</h3>
    <button class="js-chatbox-toggle chatbox__header-cta-btn u-btn"><i class="fas fa-chevron-up"></i></button>
  </div>
  <!-- End of .chatbox__header -->
  <div class="js-chatbox-display chatbox__display pb-3" id="chatBoxContainer">
    <div class="chat-messages" id="chatMessages">

    </div>
  </div>
  <!-- End of .chatbox__display -->
  <form class="js-chatbox-form chatbox__form" id="sendChat">
    <input type="text" class="js-chatbox-input chatbox__form-input" placeholder="Type your message..." required>
    <input type="text" class="js-chatbox-input-id" value="<?php echo $_SESSION['c_id']; ?>" placeholder="Type your message..." required hidden>
    <button class="chatbox__form-submit u-btn"><i class="fas fa-paper-plane"></i></button>
  </form>
  <!-- End of .chatbox__form -->
</section>
<!-- End of .chatbox -->
<?php include('js/chats.php'); ?>
<?php endif;?>