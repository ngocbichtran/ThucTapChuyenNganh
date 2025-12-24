'use strict';

/* ===================== DOM READY ===================== */
document.addEventListener('DOMContentLoaded', function () {

  /* Feather icons */
  if (typeof feather !== 'undefined') {
    feather.replace();
  }

  /* Remove loader safely */
  setTimeout(function () {
    const loader = document.querySelector('.loader-bg');
    if (loader) {
      loader.remove();
    }
  }, 400);

  /* Init menu scrollbar */
  add_scroller();

  /* Sidebar hide */
  const sidebarHide = document.querySelector('#sidebar-hide');
  if (sidebarHide) {
    sidebarHide.addEventListener('click', function () {
      document.querySelector('.pc-sidebar')?.classList.toggle('pc-sidebar-hide');
    });
  }

  /* Mobile collapse */
  const mobileCollapse = document.querySelector('#mobile-collapse');
  if (mobileCollapse) {
    mobileCollapse.addEventListener('click', function () {
      const sidebar = document.querySelector('.pc-sidebar');
      if (!sidebar) return;

      sidebar.classList.toggle('mob-sidebar-active');

      if (!document.querySelector('.pc-menu-overlay')) {
        sidebar.insertAdjacentHTML('beforeend', '<div class="pc-menu-overlay"></div>');
        document.querySelector('.pc-menu-overlay').addEventListener('click', rm_menu);
      }
    });
  }

});

/* ===================== MENU ===================== */
function add_scroller() {
  menu_click();
  if (window.SimpleBar && document.querySelector('.navbar-content')) {
    new SimpleBar(document.querySelector('.navbar-content'));
  }
}

function menu_click() {

  const parents = document.querySelectorAll('.pc-navbar > li.pc-hasmenu');

  parents.forEach(item => {
    const link = item.querySelector('.pc-link');
    if (!link) return;

    link.onclick = function (e) {
      e.preventDefault();

      const isOpen = item.classList.contains('pc-trigger');

      document.querySelectorAll('.pc-navbar li.pc-trigger').forEach(open => {
        open.classList.remove('pc-trigger');
        const sub = open.querySelector('.pc-submenu');
        if (sub) slideUp(sub, 200);
      });

      if (!isOpen) {
        item.classList.add('pc-trigger');
        const submenu = item.querySelector('.pc-submenu');
        if (submenu) slideDown(submenu, 200);
      }
    };
  });
}

/* ===================== REMOVE MENU ===================== */
function rm_menu() {
  document.querySelector('.pc-sidebar')?.classList.remove('mob-sidebar-active');
  document.querySelector('.pc-menu-overlay')?.remove();
}

/* ===================== SLIDE ===================== */
function slideUp(target, duration = 200) {
  if (!target) return;
  target.style.transition = `height ${duration}ms`;
  target.style.height = target.offsetHeight + 'px';
  target.offsetHeight;
  target.style.height = '0';
  setTimeout(() => {
    target.style.display = 'none';
    target.style.height = '';
    target.style.transition = '';
  }, duration);
}

function slideDown(target, duration = 200) {
  if (!target) return;
  target.style.display = 'block';
  const height = target.scrollHeight;
  target.style.height = '0';
  target.offsetHeight;
  target.style.transition = `height ${duration}ms`;
  target.style.height = height + 'px';
  setTimeout(() => {
    target.style.height = '';
    target.style.transition = '';
  }, duration);
}

/* ===================== ACTIVE MENU ===================== */
(function activeMenu() {
  const links = document.querySelectorAll('.pc-navbar a');
  const url = window.location.href.split(/[?#]/)[0];

  links.forEach(link => {
    if (link.href === url) {
      link.parentElement.classList.add('active');
      const parent = link.closest('.pc-hasmenu');
      if (parent) {
        parent.classList.add('pc-trigger', 'active');
        parent.querySelector('.pc-submenu')?.setAttribute('style', 'display:block');
      }
    }
  });
})();
