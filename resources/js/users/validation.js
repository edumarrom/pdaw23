const trans = {
  name: 'nombre',
  email: 'correo electrónico',
  password: 'contraseña',
};

const errorMessages = {
  required: (e) => `El campo ${e} es obligatorio.`,
  email: (e) => `El campo ${e} no es un correo válido.`,
  min: (e, n) => `El campo ${e} debe contener al menos ${n} caracteres.`,
  letters: (e) => `El campo ${e} debe contener al menos una letra.`,
  numbers: (e) => `El campo ${e} debe contener al menos un número.`,
  symbols: (e) => `El campo ${e} debe contener al menos un símbolo.`,
  confirmed: 'La confirmación de contraseña no coincide.',
};

const form = document.querySelector('#user-form');
form.addEventListener('submit', validateForm);

const request = {
  name: document.getElementById('name'),
  email: document.getElementById('email'),
  password: document.getElementById('password'),
  passwordConfirmation: document.getElementById('password_confirmation'),
};

let errors = {};

for (const key in request) {
  request[key].addEventListener('keyup', () => {
    removeErrorMessage(key);
  });
}

function validateForm(event) {
  event.preventDefault();
  errors = {};

  validate({
    name: ['required'],
    email: ['required', 'email'],
  });

   /* if (!required(request.name)) {
    errors.name = errorMessages.required(trans.name);
  } */

  /* if (!required(request.email)) {
    errors.email = errorMessages.required(trans.email);
  } else if (!isEmail(request.email)) {
    errors.email = errorMessages.email(trans.email);
  } */

  if (!required(request.password)) {
    errors.password = errorMessages.required(trans.password);
  } else if (!min(request.password, 8)) {
    errors.password = errorMessages.min(trans.password, 8);
  } else if (!letters(request.password)) {
    errors.password = errorMessages.letters(trans.password);
  } else if (!numbers(request.password)) {
    errors.password = errorMessages.numbers(trans.password);
  } else if (!symbols(request.password)) {
    errors.password = errorMessages.symbols(trans.password);
  } else if (!confirmed(request.password)) {
    errors.password = errorMessages.confirmed;
  }

  if (Object.keys(errors).length > 0) {
    showErrors(errors);
  }
  else {
    form.submit();
  }
}
function validate(elements) {
  const inputs = Object.keys(elements);

  inputs.forEach(key => {
    const validations = elements[key];

    validations.forEach(validationType => {
      switch (validationType) {
        case 'required':
          if (!required(request[key])) {
            errors[key] = errorMessages.required(trans[key]);
          }
          break;
        case 'email':
          if (!email(request[key])) {
            errors[key] = errorMessages.email(trans[key]);
          }
          break;
        default:
          break;
      }
    });
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
const email = (e) => /\S+@\S+\.\S+/.test(e.value);
const min = (e, n) => e.value.length >= n;
const letters = (e) => /[a-zA-Z]/.test(e.value);
const numbers = (e) => /\d/.test(e.value);
const symbols = (e) => /[!@#$%^&*(),.?":{}|<>]/.test(e.value);
const confirmed = (e) => e.value === document.getElementById('password_confirmation').value;
