const form = document.querySelector('#user-form');

const request = {
  name: document.getElementById('name'),
  email: document.getElementById('email'),
  password: document.getElementById('password'),
  passwordConfirmation: document.getElementById('password_confirmation'),
};

const requirements = {
  name: ['required'],
  email: ['required', 'email'],
  password: ['required', 'min:8', 'letters', 'numbers', 'symbols', 'confirmed'],
};

const trans = {
  name: 'nombre',
  email: 'correo electrónico',
  password: 'contraseña',
};

form.addEventListener('submit', validateForm);

function validateForm(event) {
  event.preventDefault();
  errors = {};

  if (window.location.href.endsWith('edit')) {
    if (request.password.value !== '') {
      requirements.password = ['min:8', 'letters', 'numbers', 'symbols', 'confirmed'];
    } else {
      delete requirements.password;
    }
  }

  validate({
    ...requirements
  });

  if (Object.keys(errors).length > 0) {
    showErrors(errors);
  }
  else {
    form.submit();
  }
}

function validate(elements) {
  typeof trans === 'undefined' ? trans = {} : null;

  const inputs = Object.keys(elements);

  inputs.forEach(key => {
    const requirements = elements[key];

    for (const requirement of requirements) {
      switch (requirement) {
        case 'required':
          if (!required(request[key])) {
            errors[key] = errorMessages.required(trans?.[key] ?? key);
            return;
          }
          break;
        case 'email':
          if (!isEmail(request[key])) {
            errors[key] = errorMessages.email(trans?.[key] ?? key);
            return;
          }
          break;
        case 'letters':
          if (!letters(request[key])) {
            errors[key] = errorMessages.letters(trans?.[key] ?? key);
            return;
          }
          break;
        case 'numbers':
          if (!numbers(request[key])) {
            errors[key] = errorMessages.numbers(trans?.[key] ?? key);
            return;
          }
          break;
        case 'symbols':
          if (!symbols(request[key])) {
            errors[key] = errorMessages.symbols(trans?.[key] ?? key);
            return;
          }
          break;
        case 'confirmed':
          if (!confirmed(request[key])) {
            errors[key] = errorMessages.confirmed;
            return;
          }
          break;
        default:
          break;
      }

      if (/^min:\d+$/.test(requirement)) {
        console.log('dentro del min!');
          const minNumber = parseInt(requirement.split(':')[1], 10);
          if (!min(request[key], minNumber)) {
            console.log('min');
            errors[key] = errorMessages.min(trans?.[key] ?? key, minNumber);
            return;
          }
        continue;
      }
    }
  });
}

let errors = {};

for (const key in request) {
  request[key].addEventListener('keyup', () => {
    removeErrorMessage(key);
  });
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

const required = (e) => /\S+/.test(e.value);
const isEmail = (e) => /\S+@\S+\.\S+/.test(e.value);
const min = (e, n) => e.value.length >= n;
const letters = (e) => /[a-zA-Z]/.test(e.value);
const numbers = (e) => /\d/.test(e.value);
const symbols = (e) => /[!@#$%^&*(),.?":{}|<>]/.test(e.value);
const confirmed = (e) => e.value === request.passwordConfirmation.value;

const errorMessages = {
  required: (e) => `El campo ${e} es obligatorio.`,
  email: (e) => `El campo ${e} no es un correo válido.`,
  min: (e, n) => `El campo ${e} debe contener al menos ${n} caracteres.`,
  letters: (e) => `El campo ${e} debe contener al menos una letra.`,
  numbers: (e) => `El campo ${e} debe contener al menos un número.`,
  symbols: (e) => `El campo ${e} debe contener al menos un símbolo.`,
  confirmed: 'La confirmación de contraseña no coincide.',
};
