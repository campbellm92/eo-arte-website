window.addEventListener("DOMContentLoaded", function () {
  const loadingScreen = document.getElementById("loading-screen");

  if (sessionStorage.getItem("homepageLoaderPlayed")) {
    if (loadingScreen) {
      loadingScreen.style.display = "none";
      document.body.style.overflow = "auto";
    }
    return;
  }

  sessionStorage.setItem("homepageLoaderPlayed", "true");

  if (loadingScreen) {
    document.body.style.overflow = "hidden";

    loadingScreen.style.display = "flex";
    loadingScreen.style.opacity = 1;
    loadingScreen.style.transition = "opacity 0.5s ease";
    setTimeout(() => {
      loadingScreen.style.opacity = 0;
      setTimeout(() => {
        loadingScreen.style.display = "none";
        document.body.style.overflow = "auto";
      }, 500);
    }, 3500);
  }
});
