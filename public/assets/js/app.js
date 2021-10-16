$(() => {
  // JQUERY MODAL/MENU OUVRANT
  let modals = $('[data-modal]');
  [...modals].forEach((trigger) => {
    trigger.addEventListener("click", (event) => {
      event.preventDefault();
      let modal = $('#'+trigger.dataset.modal);
      modal.addClass("block");
      modal.removeClass("hidden");
      let closes = modal.append('[data-modal-close]');
      [...closes].forEach((close) => {
        close.addEventListener("click", (event) => {
          event.preventDefault();
          modal.addClass("hidden");
          modal.removeClass("block");
        })
      })
    })
  })
})

/* VANILLA MODAL
let modals = document.querySelectorAll('[data-modal]');
modals.forEach(function(trigger) {
trigger.addEventListener('click', function(event) {
  event.preventDefault();
  let modal = document.getElementById(trigger.dataset.modal);
    modal.classList.add('block');
    modal.classList.remove('hidden');
    var exits = modal.querySelectorAll('[data-modal-close]');
    exits.forEach(function(exit) {
      exit.addEventListener('click', function(event) {
        event.preventDefault();
        modal.classList.remove('block');
        modal.classList.add('hidden')
      })
    })
  })
})
*/