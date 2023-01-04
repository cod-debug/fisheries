

<script>
    const toggleChatboxBtn = document.querySelector(".js-chatbox-toggle");
    const chatbox = document.querySelector(".js-chatbox");
    const chatboxMsgDisplay = document.querySelector(".js-chatbox-display");
    const chatboxForm = document.querySelector(".js-chatbox-form");

    // Use to create chat bubble when user submits text
    // Appends to display
    const createChatBubble = input => {
    const chatSection = document.createElement("p");
    chatSection.textContent = input;
    chatSection.classList.add("chatbox__display-chat");

    chatboxMsgDisplay.appendChild(chatSection);
    };

    // Toggle the visibility of the chatbox element when clicked
    // And change the icon depending on visibility
    toggleChatboxBtn.addEventListener("click", () => {
    chatbox.classList.toggle("chatbox--is-visible");
    if (chatbox.classList.contains("chatbox--is-visible")) {
        toggleChatboxBtn.innerHTML = '<i class="fas fa-chevron-down"></i>';
    } else {
        toggleChatboxBtn.innerHTML = '<i class="fas fa-chevron-up"></i>';
    }
    setTimeout(() => {
        var objDiv = document.getElementById("chatBoxContainer");
        objDiv.scrollTop = objDiv.scrollHeight;
    }, (1000));
    });

    // Form input using method createChatBubble
    // To append any user message to display
    chatboxForm.addEventListener("submit", e => {
        const message = document.querySelector(".js-chatbox-input").value;
        const from = document.querySelector(".js-chatbox-input-id").value;

        let payload = {
            message: message,
            from: from,
        }

        let endpoint = `/fisheries/requests/send-to-admin.php`;
        fetch(endpoint, {
            method: "POST",
            headers: {
            'Content-Type': 'application/json'
            },
            body: JSON.stringify(payload)
        }).then(() => {
            setTimeout(() => {
                var objDiv = document.getElementById("chatBoxContainer");
                objDiv.scrollTop = objDiv.scrollHeight;
            }, (500));
        })

        e.preventDefault();
        chatboxForm.reset();
    });
    setInterval(() => {

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("chatMessages").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "pages/public/components/messages.php", true);
        xhttp.send();
    }, 1000);
</script>