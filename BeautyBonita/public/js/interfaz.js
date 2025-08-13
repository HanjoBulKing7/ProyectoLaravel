   document.getElementById('menu-btn').addEventListener('click', function() {
    const menu = document.getElementById('mobile-menu');
    if (menu.style.display === 'block') {
      menu.style.display = 'none';
    } else {
      menu.style.display = 'block';
    }
  });
      document
        .getElementById("mobileMenuButton")
        .addEventListener("click", function () {
          const menu = document.getElementById("mobileMenu");
          const menuIcon = document.getElementById("menuIcon");
          const closeIcon = document.getElementById("closeIcon");

          if (menu.classList.contains("hidden")) {
            menu.classList.remove("hidden");
            menuIcon.classList.add("hidden");
            closeIcon.classList.remove("hidden");
          } else {
            menu.classList.add("hidden");
            menuIcon.classList.remove("hidden");
            closeIcon.classList.add("hidden");
          }
        });