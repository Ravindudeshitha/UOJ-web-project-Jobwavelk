
//menu button
let menu_but = document.querySelector(".menu_icon");
let menu_box = document.querySelector(".menu_link");

menu_but.addEventListener("click", function(){
    console.log(menu_box);
    if(menu_box.classList.contains("active")){
        menu_box.classList.remove("active");
    }
    else{
        menu_box.classList.add("active");
    }
    
                    
})