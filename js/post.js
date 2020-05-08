document.querySelector("#btnAddPost").addEventListener("click", function (e){
    let text = document.querySelector("#postContent").value;
    let id = document.querySelector("#user").dataset.id;
    let name = document.querySelector("#name").innerHTML;

    let formData = new FormData();

    formData.append("text", text);
    formData.append("id", id);

    fetch("./ajax/addPost.php", {
        method: 'POST',
        body: formData
    }).then(response => response.json())
    .then(result => {
        let newPost = document.createElement("div");
        let newName = document.createElement("strong");
        let newText = document.createElement("p");
        let newDel = document.createElement("a");

        newName.innerHTML = name + " says:";
        newText.innerHTML = result.body;
        newDel.innerHTML = "Delete";

        newPost.setAttribute("class", "post");
        newText.setAttribute("id", "text");
        newDel.setAttribute("id", "btnDelPost");
        newDel.setAttribute("href", "#")

        newPost.appendChild(newName);
        newPost.appendChild(newText);
        newPost.appendChild(newDel);

        document.querySelector("#userPost").prepend(newPost);
        document.querySelector("#postContent").value = " ";
        document.querySelector("#postContent").focus();
    })
    .catch(error => {
        console.error('Error:', error);
    });
    e.preventDefault();
});
