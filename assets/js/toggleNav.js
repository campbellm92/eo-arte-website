document.addEventListener("DOMContentLoaded", () => {
  const toggleIcon = document.getElementById("toggle-icon");
  const menu = document.getElementById("menu");

  function toggleNavMenu() {
    if (menu.classList.contains("hidden")) {
      menu.classList.remove("hidden");
    } else {
      menu.classList.add("hidden");
    }
  }
  toggleIcon.addEventListener("click", toggleNavMenu);
});
