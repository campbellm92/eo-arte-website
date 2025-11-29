document.addEventListener("DOMContentLoaded", () => {
  const showUpcomingButton = document.querySelector(".toggle-upcoming");
  const showArchiveButton = document.querySelector(".toggle-archive");
  if (!showUpcomingButton || !showArchiveButton) return;
  const upcomingObjects = document.querySelectorAll(".upcoming");
  const archiveObjects = document.querySelectorAll(".archive");

  const showUpcoming = () => {
    upcomingObjects.forEach((element) => {
      element.style.display = "flex";
    });
    archiveObjects.forEach((element) => {
      element.style.display = "none";
    });
    showUpcomingButton.classList.remove("bg-blue");
    showUpcomingButton.classList.add("bg-red");
    showArchiveButton.classList.remove("bg-red");
    showArchiveButton.classList.add("bg-blue");
  };

  const showArchive = () => {
    upcomingObjects.forEach((element) => {
      element.style.display = "none";
      showUpcomingButton.classList.remove("bg-blue");
    });
    archiveObjects.forEach((element) => {
      element.style.display = "flex";
    });

    showArchiveButton.classList.add("bg-red");
    showArchiveButton.classList.remove("bg-blue");
    showUpcomingButton.classList.remove("bg-red");
    showUpcomingButton.classList.add("bg-blue");
  };

  showUpcomingButton.addEventListener("click", (e) => {
    e.preventDefault();
    showUpcoming();
  });

  showArchiveButton.addEventListener("click", (e) => {
    e.preventDefault();
    showArchive();
  });

  // show upcoming by default
  showUpcoming();
});
