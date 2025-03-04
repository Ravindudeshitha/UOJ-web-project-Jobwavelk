const header = document.querySelector('.top_navigation');

window.onscroll = function(){
    var top = window.scrollY;

    if(top >0){
    header.classList.add('scrolled');
    }
    else{
        header.classList.remove('scrolled');
    }
}

