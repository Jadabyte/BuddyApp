document.querySelector("#btnAddPost").addEventListener("click", function (){
    let text = document.querySelector("#postContent").value;
    let formData = new FormData();

    formData.append('text', text);

    fetch("./ajax/addPost.php", {
        method: 'POST',
        body: formData
    }).then(response => response.json())
    .then(result => {
        console.log(result);
        let newPost = document.createElement('li');
        newPost.innerHTML = result.body;
        document.querySelector(".posts").appendChild(newPost);
    })
    .catch(error => {
        console.error('Error:', error);
    });
});