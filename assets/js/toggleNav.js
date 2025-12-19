document.addEventListener("DOMContentLoaded", () => {
  const toggleIcon = document.getElementById("toggle-icon");
  const menu = document.getElementById("menu");

  function openMenu() {
    menu.classList.remove("hidden");
    toggleIcon.setAttribute("aria-expanded", "true");
  }

  function closeMenu() {
    menu.classList.add("hidden");
    toggleIcon.setAttribute("aria-expanded", "false");
    toggleIcon.focus();
  }

  function toggleNavMenu() {
    const isOpen = !menu.classList.contains("hidden");
    isOpen ? closeMenu() : openMenu();
  }

  toggleIcon.addEventListener("click", toggleNavMenu);

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && !menu.classList.contains("hidden")) {
      closeMenu();
    }
  });
});
