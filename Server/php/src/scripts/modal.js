function validate(form) {
    
    let validate = true

    form.forEach(element => {
        if(element.value.length===0) {
            const errorText = element.parentElement.querySelector('.modal__error-text')
            element.classList.add('modal__error-input-textarea')
            errorText.style.display = "flex"
            errorText.innerHTML = "<div class='icon icon-error'></div><span>Обязательное поле</span>"
            validate = false
        }        
    });

    if(form[0].value.length>200) {
        const errorText = form[0].parentElement.querySelector('.modal__error-text')
        form[0].classList.add('modal__error-input-textarea')
        errorText.style.display = "flex"
        errorText.innerHTML = "<div class='icon icon-error'></div><span>Заголовок заметки должен быть не более 200 символов</span>"
        validate = false
    }

    if(form[2].value.length>2000) {
        const errorText = form[2].parentElement.querySelector('.modal__error-text')
        form[2].classList.add('modal__error-input-textarea')
        errorText.style.display = "flex"
        errorText.innerHTML = "<div class='icon icon-error'></div><span>Текст заметки должен быть не более 2000 символов</span>"
        validate = false
    }

    return validate    
}

function addNote() {
    let noteId = document.querySelector('#id-input')
    let noteTitle = document.querySelector('#title-input')
    let noteDate = document.querySelector('#datetime-input')
    let noteText = document.querySelector('#note-textarea')

    let form = [noteTitle, noteDate, noteText]

    if (validate(form)) {            
        const request = new XMLHttpRequest();
    
        const url = "./ajax/add-note.php";
        
        const params = "noteId=" + noteId.value + "&noteTitle=" + noteTitle.value + "&noteDate=" + noteDate.value + "&noteText=" + noteText.value;
        
        request.responseType =	"json";
        request.open("POST", url, true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        request.addEventListener("readystatechange", () => {
    
            if(request.readyState === 4 && request.status === 200) {       
                console.log(request);
            }
        });
        
        request.send(params);

        window.location.href = "";
    }
}


document.addEventListener("DOMContentLoaded", () => {    
    let errorInp = document.querySelectorAll(".modal__error-input-textarea")

    for(let i = 0; i < errorInp.length; i++) {
        sortBtns[i].addEventListener('onkeyup', function(e) {
            this.classList.remove('modal__error-input-textarea')
        });
    }
    
    //запрос на добавление заметки
    document.querySelector('.modal__add-button').addEventListener('click', () => {
        addNote()
     })
})

