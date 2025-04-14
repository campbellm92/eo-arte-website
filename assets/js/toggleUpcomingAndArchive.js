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
    showUpcomingButton.classList.remove("bg-inherit", "text-gray");
    showUpcomingButton.classList.add("bg-gray", "text-dark-gray");
    showArchiveButton.classList.remove("bg-gray", "text-dark-gray");
    showArchiveButton.classList.add("bg-inherit", "text-gray");
  };

  const showArchive = () => {
    upcomingObjects.forEach((element) => {
      element.style.display = "none";
      showUpcomingButton.classList.remove("bg-gray", "text-dark-gray");
    });
    archiveObjects.forEach((element) => {
      element.style.display = "flex";
    });

    showArchiveButton.classList.add("bg-gray", "text-dark-gray");
    showArchiveButton.classList.remove("bg-inherit", "text-gray");
    showUpcomingButton.classList.remove("bg-gray", "text-dark-gray");
    showUpcomingButton.classList.add("bg-inherit", "text-gray");
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
