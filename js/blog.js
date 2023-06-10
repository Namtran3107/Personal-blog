

function unHiden(){
    var page = new URLSearchParams(window.location.search);
    let pages = page.get('page');
    if(pages === null){
        pages = 1;
    }
    var getNumberPage = pages;
    const countBlog = document.getElementsByClassName('col-md-6');
    for (let i = (getNumberPage*3)-3; i < getNumberPage*3; i++) {
        if (countBlog[i]) {
          countBlog[i].style.display = "block";
        }
    }
}
unHiden();


function filterBlog() {
    
    let colblog = document.querySelectorAll('.col-md-6');
    let gettopiccheck = document.querySelector('#topic-check').value;
    
    if(gettopiccheck === ""){
        for (let i = 0; i < colblog.length; i++) {
            colblog[i].style.display = "block";
        }
    }else{
        for (let i = 0; i < colblog.length; i++) {
            let gettopic = colblog[i].querySelector('.blog-need-filter').textContent;
            if(gettopic == gettopiccheck){
                colblog[i].style.display = "block";
            }else{
                colblog[i].style.display = "none";
            }
        }
    }
}
