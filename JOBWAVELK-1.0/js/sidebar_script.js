
let arrow = document.querySelectorAll(".arrow");

for (var i = 0; i < arrow.length; i++) {
  arrow[i].addEventListener("click", (e) => {
    let arrowParent = e.target.parentElement.parentElement; // selecting main parent of arrow
    
    // Close all other open submenus
    let openSubmenus = document.querySelectorAll(".showMenu");
    for (let j = 0; j < openSubmenus.length; j++) {
      if (openSubmenus[j] !== arrowParent) {
        openSubmenus[j].classList.remove("showMenu");
      }
    }
    
    arrowParent.classList.toggle("showMenu");
  });
}

let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bxs-chevrons-left");

let open_close = document.querySelector
console.log(sidebarBtn);
sidebarBtn.addEventListener("click", () => {
  sidebar.classList.toggle("close");
  
});
