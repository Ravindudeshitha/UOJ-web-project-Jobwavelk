function blurbackground(){
    var blur = document.getElementById('blur');
    blur.classList.add('active');

    var blur2 = document.getElementById('blur2');
    blur2.classList.add('active');

    var window = document.getElementById('ViewPopup');
    window.classList.add('active');

    document.getElementById('closebtn').addEventListener("click",function(){
    document.getElementById('blur').classList.remove('active');
    document.getElementById('blur2').classList.remove('active');
    });
     
    document.querySelector(".closebtn").addEventListener("click",function(){
    document.querySelector(".ViewPopup").classList.remove("active");
    });

    document.querySelector(".colse_blur_div").addEventListener("click",function(){
        document.querySelector(".ViewPopup").classList.remove("active");
    });

    document.getElementById('closediv').addEventListener("click",function(){
    document.getElementById('blur').classList.remove('active');
    });
}