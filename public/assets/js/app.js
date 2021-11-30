// Gestion affichage alert/flash (masquer)


// Gestion affichage modal/popup (afficher)
let modals = document.querySelectorAll('[data-modal]');
modals.forEach(function(trigger) {
  trigger.addEventListener('click', function(event) {
    event.preventDefault();

    let modal = document.getElementById(trigger.dataset.modal);
    let background = document.querySelector(`#${trigger.dataset.modal} #background`);
    let foreground = document.querySelector(`#${trigger.dataset.modal} #foreground`);
    let exits = modal.querySelectorAll('[data-modal-close]');

    modal.classList.add('visible');
    modal.classList.remove('invisible');

    // "Entering", "To", ("From" in classes)
    background.classList.add('ease-out', 'duration-300', 'opacity-100');
    // "Leaving", "To", ("From" at the end of classList.add)
    background.classList.remove('ease-in', 'duration-200', 'opacity-0');

    foreground.classList.add('ease-out', 'duration-300', 'opacity-100', 'translate-y-0', 'sm:scale-100');
    foreground.classList.remove('ease-in', 'duration-200', 'opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');

    exits.forEach(function(exit) {
      exit.addEventListener('click', function(event) {
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
        }, 100);
      })
    })
  })
})