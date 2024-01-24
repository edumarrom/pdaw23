errorMessages = {
  name: 'El campo nombre es obligatorio',
}

const form = document.querySelector('#level-form');
form.addEventListener('submit', validateForm);

function validateForm(event) {
  event.preventDefault();
  const name = document.getElementById('name').value;

  const errors = {};
  if (
    name === null
    || name.trim() === ''
  ) {
    errors.name = errorMessages.name;
  }

  if (Object.keys(errors).length > 0) {
    showErrors(errors);
  }
  else {
    form.submit();
  }
}

function showErrors(errors) {
  for (const key in errors) {
    removeErrorMessage(key);
    const errorMessage = createErrorMessage(key, errors[key]);
    const input = document.getElementById(key);
    input.classList.add('border-red-600');
    input.insertAdjacentElement('afterend', errorMessage);
  }
}

function createErrorMessage(key, message) {
  const element = document.createElement('p');
  element.id = key + '-error';
  element.classList.add('text-sm', 'text-red-600', 'mt-2');
  element.textContent = message;
  return element;
}

function removeErrorMessage(key) {
  const oldErrorMessage = document.getElementById(key + '-error');
  if (oldErrorMessage) {
    oldErrorMessage.remove();
  }
}
