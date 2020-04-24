document.querySelector("#btnAddMessage").addEventListener("click", function(){
    let messageId = this.dataset.messageId;
    let text = document.querySelector("#messageText").value;

    console.log(messageId);
    console.log(text);

    let formData = new FormData();
    formData.append("text", text);
    formData.append("messageId", messageId);
    fetch("savemessage.php",{
         method: "POST",
         body: formData
    })
         .then(response =>response.json())
         .then(result =>{
              let newMessage = document.createElement('li');
              newMessage.innerHTML = result.body;
              document
              .querySelector(".message__list")
              .appendChild(newMessage);

         })
         .catch(error => {
              console.log("Error:", error);
         });
});