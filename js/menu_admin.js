const sidebar = document.querySelector(".sidebar");
const sidebarToggler = document.querySelector(".sidebar-toggler");
const menuToggler = document.querySelector(".menu-toggler");
let collapsedSidebarHeight = "56px";
let fullSidebarHeight = "calc(100vh - 32px)";

// Alterna o estado colapsado da sidebar
sidebarToggler.addEventListener("click", () => {
  sidebar.classList.toggle("collapsed");
});

// Alterna o menu ativo/inativo
menuToggler.addEventListener("click", () => {
  const isMenuActive = sidebar.classList.toggle("menu-active");
  toggleMenu(isMenuActive);
});

// Função para atualizar a altura da sidebar com base no estado
const toggleMenu = (isMenuActive) => {
  if (isMenuActive) {
    sidebar.style.height = `${sidebar.scrollHeight}px`;
    menuToggler.querySelector("span").innerText = "close";
  } else {
    sidebar.style.height = collapsedSidebarHeight;
    menuToggler.querySelector("span").innerText = "menu";
  }
};

// Ajusta a altura da sidebar ao redimensionar a janela
window.addEventListener("resize", () => {
  if (window.innerWidth >= 1024) {
    sidebar.style.height = fullSidebarHeight;
  } else {
    sidebar.classList.remove("collapsed");
    toggleMenu(sidebar.classList.contains("menu-active"));
  }
});

// ------------------------------------------------------------------------------------------------------//


document.addEventListener("DOMContentLoaded", () => {
  const dropdownItems = document.querySelectorAll(".nav-item.dropdown");
  const sidebarToggler = document.querySelector(".sidebar-toggler");
  const sidebar = document.querySelector(".sidebar");

  // Alternar dropdown ao clicar no item principal
  dropdownItems.forEach((item) => {
    const navLink = item.querySelector(".nav-link");
    const dropdownMenu = item.querySelector(".dropdown-menu");

    navLink.addEventListener("click", (e) => {
      e.preventDefault(); // Previne a navegação se o link tiver href="#"
      // Fecha outros dropdowns antes de abrir o atual
      dropdownItems.forEach((otherItem) => {
        if (otherItem !== item) {
          otherItem.querySelector(".dropdown-menu").style.display = "none";
        }
      });

      // Alternar visibilidade do dropdown atual
      dropdownMenu.style.display =
        dropdownMenu.style.display === "flex" ? "none" : "flex";
    });
  });

  // Fechar dropdowns ao minimizar o menu lateral
  sidebarToggler.addEventListener("click", () => {
    sidebar.classList.toggle("collapsed");

    if (sidebar.classList.contains("collapsed")) {
      dropdownItems.forEach((item) => {
        const dropdownMenu = item.querySelector(".dropdown-menu");
        dropdownMenu.style.display = "none";
      });
    }
  });
});