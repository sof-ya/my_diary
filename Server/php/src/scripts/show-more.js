document.addEventListener("DOMContentLoaded", () => {    
    document.querySelector("#show-more-btn").addEventListener('click', () => {
        const btnElem = document.querySelector("#show-more-btn")
        var xmlHttp = new XMLHttpRequest();
        let pageNum = parseInt(btnElem.getAttribute('data-page'))
        let paginPages = document.querySelectorAll(".pagin__page")
        xmlHttp.open( "GET", `./ajax/show-more.php?page=${pageNum}`, false ); // false for synchronous request
        xmlHttp.send(null);
        document.querySelector('.notes__notes-container').innerHTML += xmlHttp.responseText;
        pageNum++
        btnElem.setAttribute('data-page', pageNum)
        if(paginPages[paginPages.length-2].innerHTML == pageNum) {
            btnElem.style.display = "none"
        }
    })
})