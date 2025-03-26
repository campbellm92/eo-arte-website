document.addEventListener("DOMContentLoaded", function () {
  const mainNav = document.getElementById("main-nav");
  const siteTitle = document.getElementById("site-title");
  const navLinks = document.querySelectorAll(".nav-links");
  const heroSection = document.getElementById("hero-section");

  window.addEventListener("scroll", () => {
    if (window.scrollY > heroSection?.offsetHeight / 1.1) {
      // the default or 'scrolled' styles
      mainNav.classList.add("main-nav-scrolled");
      siteTitle.classList.add("site-title-scrolled");
      navLinks.forEach((link) => link.classList.add("links-default"));
    } else {
      // the styles at the hero section
      mainNav.classList.remove("main-nav-scrolled");
      siteTitle.classList.remove("site-title-scrolled");
      navLinks.forEach((link) => link.classList.remove("links-default"));
    }
  });
});
