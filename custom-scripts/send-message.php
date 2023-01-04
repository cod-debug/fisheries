
<script>
    const chatboxForm = document.querySelector("#sendReply");
  $("#sendReply").on('submit', (e) => {
    e.preventDefault();
    
    var message = $("#message").val();
    var from = $("#from").val();
    var to = $("#to").val();

    let payload = {
        message: message,
        from: from,
        to: to,
    }

    let endpoint = `/fisheries/requests/send-to-user.php`;
    fetch(endpoint, {
        method: "POST",
        headers: {
        'Content-Type': 'application/json'
        },
        body: JSON.stringify(payload)
    })
    chatboxForm.reset();
  })

  setInterval(() => {
        var to = document.getElementById('to').value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("chatMessages").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "pages/live-chats.php?user_id="+to, true);
        xhttp.send();
    }, 500);
</script>
