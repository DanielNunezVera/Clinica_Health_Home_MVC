const btn_menu = document.getElementById("btn_menu")
if (btn_menu) {
    btn_menu.addEventListener("click", function(){
        nav.style.right = "0px";
        background_menu.style.display = "block";
    });
}

const back_menu = document.getElementById("back_menu")
if (back_menu) {
    back_menu.addEventListener("click", function(){
        nav.style.right = "-250px";
        background_menu.style.display = "none";
    });
}

nav = document.getElementById("nav");
background_menu = document.getElementById("back_menu");

// function mostrar_menu(){

//     nav.style.right = "0px";
//     background_menu.style.display = "block";
// }

// function ocultar_menu(){

//     nav.style.right = "-250px";
//     background_menu.style.display = "none";
// }