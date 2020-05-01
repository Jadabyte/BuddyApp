document.querySelector("#btnAddTodo").addEventListener("click", function(){
    let text = document.querySelector("#todoContent").value;
    
    let formData = new FormData();

    formData.append('text', text);
    
    fetch("ajax/addTodo.php", {
        method: 'POST',
        body: formData
    })
        .then((response) => response.json())
        .then((result) => {
            let newTodo = document.createElement('li');
            newTodo.innerHTML = result.body;
            document.querySelector(".todoList").appendChild(newTodo);
        })
        .catch((error) => {
            console.error('Error:', error);
        });
});