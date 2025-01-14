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