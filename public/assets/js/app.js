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
const alert = document.getElementById('notify');
if (alert != null) {
  // Fade in quand la notification apparaît
  setTimeout(() => {
    alert.classList.add('transform', 'ease-out', 'duration-300', 'transition', 'translate-x-0', 'opacity-100', 'sm:-translate-y-0');
    alert.classList.remove('transition', 'ease-in', 'duration-100', 'opacity-0');
  }, 100);

  // Fade off automatique au bout de x secondes
  setTimeout(() => {
    alert.classList.add('transition', 'ease-in', 'duration-100', 'opacity-0');
    alert.classList.remove('transform', 'ease-out', 'duration-300', 'transition', 'translate-x-0', 'opacity-100', 'sm:-translate-y-0');

    // Devient invisible
    setTimeout(() => {
      alert.classList.add('invisible');
    }, 100);
  }, 2500);

  // Fermer de force via le boutton
  const exits = alert.querySelectorAll('#notify [data-alert-close]');
  exits.forEach((exit) => {
    exit.addEventListener('click', (event) => {
      event.preventDefault();

      alert.classList.add('transition', 'ease-in', 'duration-100', 'opacity-0');
      alert.classList.remove('transform', 'ease-out', 'duration-300', 'transition', 'translate-y-0', 'opacity-100', 'sm:translate-x-0');

      setTimeout(() => {
        alert.classList.add('invisible');
        alert.classList.remove('visible');
      }, 100);
    })
  })
}

// Gestion affichage dropdowns
const dropdowns = document.querySelectorAll('[aria-haspopup="true"]'); //document.querySelectorAll('[role="menu"]');
dropdowns.forEach((trigger) => {

})

// Gestion affichage modal/popup (afficher)
const modals = document.querySelectorAll('[data-modal]');
modals.forEach((trigger) => {
  trigger.addEventListener('click', (event) => {
    event.preventDefault();

    const modal = document.getElementById(trigger.dataset.modal);
    const background = document.querySelector(`#${trigger.dataset.modal} #background`);
    const foreground = document.querySelector(`#${trigger.dataset.modal} #foreground`);
    const exits = modal.querySelectorAll('[data-modal-close]');

    modal.classList.add('visible');
    modal.classList.remove('invisible');

    // "Entering", "To", ("From" in classes)
    background.classList.add('ease-out', 'duration-300', 'opacity-100');
    // "Leaving", "To", ("From" at the end of classList.add)
    background.classList.remove('ease-in', 'duration-200', 'opacity-0');

    foreground.classList.add('ease-out', 'duration-300', 'opacity-100', 'translate-y-0', 'sm:scale-100');
    foreground.classList.remove('ease-in', 'duration-200', 'opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');

    exits.forEach((exit) => {
      exit.addEventListener('click', (event) => {
        event.preventDefault();

        // "Leaving", "To", ("From" at the end of classList.remove)
        background.classList.add('ease-in', 'duration-200', 'opacity-0');
        // "Entering", "To", ("From" at the end of classList.add and in classes)
        background.classList.remove('ease-out', 'duration-300', 'opacity-100');

        foreground.classList.add('ease-in', 'duration-200', 'opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');
        foreground.classList.remove('ease-out', 'duration-300', 'opacity-100', 'translate-y-0', 'sm:scale-100');

        setTimeout(() => {
          modal.classList.add('invisible');
          modal.classList.remove('visible');
        }, 200);
      })
    })
  })
})

document.addEventListener('scroll', () => {
  const navbar = document.querySelector('#main-navbar');
  console.log(navbar.offsetTop);
  if (window.scrollY >= navbar.offsetHeight) {
    navbar.classList.add('shadow', 'transition', 'duration-200', 'bg-white/90', 'backdrop-blur-md');
    navbar.classList.remove('bg-gray-100', 'py-2');
  } else {
    navbar.classList.add('bg-gray-100', 'py-2');
    navbar.classList.remove('shadow', 'transition', 'duration-200', 'bg-white/90');
  }
})

const password = document.querySelector('#password');
const togglePassView = document.querySelector('#togglePassView');
togglePassView.addEventListener('click', () => {
  password.setAttribute('type', password.getAttribute('type') === 'password' ? 'text' : 'password');
  const eyeOpened = document.querySelector('#eye-opened');
  const eyeDashed = document.querySelector('#eye-dashed');
  eyeOpened.classList.toggle('hidden');
  eyeDashed.classList.toggle('hidden');
})