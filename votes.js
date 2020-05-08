document.querySelector("#btnAddVote").addEventListener("click", function(){
    let postId = this.dataset.postId;
});
    let formData = new FormData
    formData.append('postId', postId);

    fetch('savevotes.php', {
        method: 'POST',
        body: formData
    })
    .then((response) => response.json())
    .then((result) =>{
        let newVote = document.createElement('a');
        newVote.innerHTML = result.body;
        document.querySelector(".btn").appendChild(newVote);

    })
    .catch((error) =>{
        console.log(':Error',error);
    })
