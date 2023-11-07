function sortingCards(sort) {
    const request = new XMLHttpRequest();
        
    const url = "./ajax/change-sort.php";
    
    const params = "sort=" + sort;
    
    request.responseType =	"json";
    request.open("POST", url, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    request.addEventListener("readystatechange", () => {

        if(request.readyState === 4 && request.status === 200) {       
            console.log(request);
        }
    });
    
    request.send(params);
}



document.addEventListener("DOMContentLoaded", function() {

    //вызов модального окна с созданием заметки
    document.querySelector('.header__create-button').addEventListener('click', (e) => {
        document.querySelector('.modal').style.display = 'block';
    })
    
    let sortBtns = document.querySelectorAll('.main__sort-button')

    for (var i = 0; i < sortBtns.length; i++) {
        sortBtns[i].addEventListener('click', function(e) {
            sortingCards(this.getAttribute('data-sort'))

            setTimeout(() => {
                window.location.reload();
            }, 100)
        });
    }

     document.querySelector('.notes__notes-container').addEventListener("scroll", () => {
        console.log("scrol")
     })

     window.addEventListener("scroll", () => { 
        if (window.scrollY>400) {
            document.querySelector('.up-link').style.display = "table"
        }

        if (window.scrollY<400) {
            document.querySelector('.up-link').style.display = "none"
        }
    }); 


  });

