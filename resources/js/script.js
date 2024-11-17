const sidebar = document.querySelector(".sidebar");
const toggle = document.querySelector(".toggle");

toggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
});
