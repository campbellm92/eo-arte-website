window.addEventListener("load", function () {
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
    setTimeout(() => {
      loadingScreen.style.opacity = 0;
      loadingScreen.style.transition = "opacity 0.5s ease";

      setTimeout(() => {
        loadingScreen.style.display = "none";
        document.body.style.overflow = "auto";
      }, 500);
    }, 7000);
  }
});
