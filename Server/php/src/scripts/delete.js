document.addEventListener("DOMContentLoaded", function() {

  //запрос на удаление заметки
    document.querySelector('.modal__delete-note-js').addEventListener('click', () => {
        let noteId = document.querySelector('#id-input')            
        const request = new XMLHttpRequest();
    
        const url = "./ajax/delete-note.php";
        
        const params = "noteId=" + noteId.value;
        
        request.responseType =	"json";
        request.open("POST", url, true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        request.addEventListener("readystatechange", () => {
    
            if(request.readyState === 4 && request.status === 200) {       
                console.log(request);
            }
        });
        
        request.send(params);
    })
})