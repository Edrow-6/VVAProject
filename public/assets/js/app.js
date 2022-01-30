/**
 * IN
 * add() = "Entering", "To", ("From" in classes)
 * remove() = "Leaving", "To", ("From" at the end of classList.add)
 *
 * OUT
 * add() = "Leaving", "To", ("From" at the end of classList.remove)
 *  remove() = "Entering", "To", ("From" at the end of classList.add and in classes)
 */
// Gestion affichge notification

var notify = document.getElementById('notify');

if (notify != null) {
  // Fade in quand la notification apparaît
  setTimeout(function () {
    notify.classList.add('transform', 'ease-out', 'duration-300', 'transition', 'translate-x-0', 'opacity-100', 'sm:-translate-y-0');
    notify.classList.remove('transition', 'ease-in', 'duration-100', 'opacity-0');
  }, 100); // Fade off automatique au bout de x secondes

  setTimeout(function () {
    notify.classList.add('transition', 'ease-in', 'duration-100', 'opacity-0');
    notify.classList.remove('transform', 'ease-out', 'duration-300', 'transition', 'translate-x-0', 'opacity-100', 'sm:-translate-y-0'); // Devient invisible

    setTimeout(function () {
      notify.classList.add('invisible');
    }, 100);
  }, 2500); // Fermer de force via le boutton

  var exits = notify.querySelectorAll('#notify [data-alert-close]');
  exits.forEach(function (exit) {
    exit.addEventListener('click', function (event) {
      event.preventDefault();
      notify.classList.add('transition', 'ease-in', 'duration-100', 'opacity-0');
      notify.classList.remove('transform', 'ease-out', 'duration-300', 'transition', 'translate-y-0', 'opacity-100', 'sm:translate-x-0');
      setTimeout(function () {
        notify.classList.add('invisible');
        notify.classList.remove('visible');
      }, 100);
    });
  });
}
/**
 * Comment Popup list animation bkp
 * x-transition:enter="transition-transform transition-opacity ease-out duration-300"
 * x-transition:enter-start="opacity-0 transform -translate-x-2"
 * x-transition:enter-end="opacity-100 transform translate-x-0"
 * x-transition:leave="transition ease-in duration-100"
 * x-transition:leave-end="opacity-0 transform -translate-x-3"
 */
// Gestion affichage dropdowns


var dropdowns = document.querySelectorAll('[data-dropdown]');
dropdowns.forEach(function (trigger) {
  var open = false;
  trigger.addEventListener('click', function (event) {
    event.preventDefault();
    var dropdown = document.querySelector("#".concat(trigger.dataset.dropdown));
    open = !open;

    if (open) {
      dropdown.removeAttribute('cloak');
      setTimeout(function () {
        dropdown.classList.add('transition', 'ease-out', 'duration-100', 'opacity-100', 'scale-100');
        dropdown.classList.remove('transition', 'ease-in', 'duration-75', 'opacity-0', 'scale-95');
      }, 25);
    } else {
      dropdown.classList.add('transition', 'ease-in', 'duration-75', 'opacity-0', 'scale-95');
      dropdown.classList.remove('transition', 'ease-out', 'duration-100', 'opacity-100', 'scale-100');
      setTimeout(function () {
        dropdown.setAttribute('cloak', '');
      }, 50);
    }
  });
}); // Gestion affichage modal/popup (afficher)

var modals = document.querySelectorAll('[data-modal]');
modals.forEach(function (trigger) {
  trigger.addEventListener('click', function (event) {
    event.preventDefault();
    var modal = document.getElementById(trigger.dataset.modal);
    var background = document.querySelector("#".concat(trigger.dataset.modal, " #background"));
    var foreground = document.querySelector("#".concat(trigger.dataset.modal, " #foreground"));
    var exits = modal.querySelectorAll('[data-modal-close]');
    modal.classList.add('visible');
    modal.classList.remove('invisible');
    background.classList.add('ease-out', 'duration-300', 'opacity-100');
    background.classList.remove('ease-in', 'duration-200', 'opacity-0');
    foreground.classList.add('ease-out', 'duration-300', 'opacity-100', 'translate-y-0', 'sm:scale-100');
    foreground.classList.remove('ease-in', 'duration-200', 'opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');
    exits.forEach(function (exit) {
      exit.addEventListener('click', function (event) {
        event.preventDefault();
        background.classList.add('ease-in', 'duration-200', 'opacity-0');
        background.classList.remove('ease-out', 'duration-300', 'opacity-100');
        foreground.classList.add('ease-in', 'duration-200', 'opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');
        foreground.classList.remove('ease-out', 'duration-300', 'opacity-100', 'translate-y-0', 'sm:scale-100');
        setTimeout(function () {
          modal.classList.add('invisible');
          modal.classList.remove('visible');
        }, 200);
      });
    });
  });
}); // Gestion dynamisme de la navbar principale

document.addEventListener('scroll', function () {
  var navbar = document.querySelector('#main-navbar');

  if (window.scrollY >= navbar.offsetHeight) {
    navbar.classList.add('shadow', 'transition', 'duration-200', 'bg-white/90', 'backdrop-blur-md');
    navbar.classList.remove('bg-gray-100', 'py-2');
  } else {
    navbar.classList.add('bg-gray-100', 'py-2');
    navbar.classList.remove('shadow', 'transition', 'duration-200', 'bg-white/90');
  }
}); // Gestion bouton d'affichage du mot de passe

var password = document.querySelector('#password');

if (password != null) {
  var togglePassView = document.querySelector('#togglePassView');
  togglePassView.addEventListener('click', function () {
    password.setAttribute('type', password.getAttribute('type') === 'password' ? 'text' : 'password');
    var eyeOpened = document.querySelector('#eye-opened');
    var eyeDashed = document.querySelector('#eye-dashed');
    eyeOpened.classList.toggle('hidden');
    eyeDashed.classList.toggle('hidden');
  });
}
