document.getElementById("btn_menu").addEventListener("click", ()=>{
    nav.style.right = "0px";
    background_menu.style.display = "block";
});

document.getElementById("back_menu").addEventListener("click", ()=>{
    nav.style.right = "-250px";
    background_menu.style.display = "none";
});

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