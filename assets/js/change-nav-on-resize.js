// show nav icon on window resize
// toggle nav

window.addEventListener("resize", () => {
  const navLinks = document.querySelectorAll(".nav-links");
  const viewportWidth = window.innerWidth;
  const breakpointWidth = 700;

  navLinks.forEach((link) => {
    link.style.display = viewportWidth < breakpointWidth ? "none" : "block";
  });
});
