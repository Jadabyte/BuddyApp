document.querySelector("#btnAddLike").addEventListener("click", function(){
    let messageId = this.dataset.messageid;
});

let formData = new FormData();

formData.append('messageId', messageId);

fetch('savelike.php', {
    method: 'POST',
    body: formData
})
.then((response) => response.json())
.then((result) =>{
    let newLike = document.createElement('a');
    newLike.innerHTML = result.body;
    document.querySelector(".btn").appendChild(newLike);
})
.catch((error) =>{
    console.error('Error:', error);
});