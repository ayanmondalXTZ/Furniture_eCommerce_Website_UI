const menuToggle = document.getElementById("menuToggle");
const navMenu = document.getElementById("navMenu");

menuToggle.addEventListener("click", () => {
    navMenu.classList.toggle("active");
});
let sun = document.querySelector(".sun");
let moon = document.querySelector(".moon");
moon.addEventListener("click", () => {
    document.body.style.backgroundColor = "black";
    document.
        document.documentElement.classList.add("ri-sun-line");
})