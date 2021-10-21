let modals = document.querySelectorAll('[data-modal]');
modals.forEach(function(trigger) {
trigger.addEventListener('click', function(event) {
  event.preventDefault();
  let modal = document.getElementById(trigger.dataset.modal);
    modal.classList.add('block');
    modal.classList.remove('hidden');
    let exits = modal.querySelectorAll('[data-modal-close]');
    exits.forEach(function(exit) {
      exit.addEventListener('click', function(event) {
        event.preventDefault();
        modal.classList.remove('block');
        modal.classList.add('hidden')
      })
    })
  })
})