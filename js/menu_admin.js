const sidebar = document.querySelector(".sidebar");
const sidebarToggler = document.querySelector(".sidebar-toggler");
const menuToggler = document.querySelector(".menu-toggler");
let collapsedSidebarHeight = "100px";
let fullSidebarHeight = "100vh";

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


// ------------------------------------------------------------------------------------------------------ //


document.addEventListener("DOMContentLoaded", () => {
  const dropdownItems = document.querySelectorAll(".nav-item.dropdown");
  const sidebarToggler = document.querySelector(".sidebar-toggler");
  const sidebar = document.querySelector(".sidebar");

  dropdownItems.forEach((item) => {
    const navLink = item.querySelector(".nav-link");
    const dropdownMenu = item.querySelector(".dropdown-menu");

    navLink.addEventListener("click", (e) => {
      e.preventDefault();

      if (sidebar.classList.contains("collapsed")) {
        sidebar.classList.remove("collapsed");
      }

      // Alternar visibilidade do dropdown atual
      const isCurrentlyOpen = dropdownMenu.style.display === "flex";
      dropdownMenu.style.display = isCurrentlyOpen ? "none" : "flex";
    });
  });

  // Fechar todos os dropdowns ao minimizar o menu lateral
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

// Função para alternar o estado da sidebar
sidebarToggler.addEventListener("click", () => {
  sidebar.classList.toggle("collapsed");
});


// ------------------------------------------------------------------------------------------------------ //


const dropdownLinks = document.querySelectorAll('.nav-item.dropdown > a');

dropdownLinks.forEach(link => {
  // Adiciona um evento de clique em cada link
  link.addEventListener('click', function (event) {
    // Impede que o link seja seguido (evita o comportamento padrão)
    event.preventDefault();

    // Alterna a visibilidade do menu dropdown
    const dropdownMenu = this.nextElementSibling;
    dropdownMenu.classList.toggle('show');

    // Alterna o ícone entre expand_more e expand_less
    const icon = this.querySelector('.dropdown-icon');
    if (icon.textContent === 'expand_more') {
      icon.textContent = 'expand_less';
    } else {
      icon.textContent = 'expand_more';
    }
  });
});

// ------------------------------------------------------------------------------------------------------ //


function loadRegisto() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function () {
    const container = document.getElementById("container");
    container.innerHTML = this.responseText;
  };
  xhttp.open("GET", "../php/registo_admin.php");
  xhttp.send();
}

function loadVer() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function () {
    const container = document.getElementById("container");
    container.innerHTML = this.responseText;
  };
  xhttp.open("GET", "../php/lista_users.php");
  xhttp.send();
}

function loadEmails() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function () {
    const container = document.getElementById("container");
    container.innerHTML = this.responseText;
    const script = document.createElement('script');
    script.src = '../js/filter_emails.js';
    document.body.appendChild(script);
  };
  xhttp.open("GET", "../php/ver_emails.php");
  xhttp.send();
}