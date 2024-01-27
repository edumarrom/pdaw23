// required: (e) => `El campo ${e.name} es obligatorio.`
errorMessages = {
  name: {
    required: 'El campo nombre es obligatorio.',
  },
  email: {
    required: 'El campo correo electrónico es obligatorio.',
    email: 'El campo correo electrónico no es un email válido.',
  },
  password: {
    required: 'El campo contraseña es obligatorio.',
    min: 'El campo contraseña debe tener al menos 8 caracteres.',
    number: 'El campo contraseña debe tener al menos un número.',
    special: 'El campo contraseña debe tener al menos un caracter especial.',
    confirmation: 'La confirmación de contraseña no coincide.',
  },
};

const form = document.querySelector('#user-form');
form.addEventListener('submit', validateForm);

function validateForm(event) {
  event.preventDefault();

  const name = document.getElementById('name');
  removeErrorMessage('name');

  const email = document.getElementById('email');
  removeErrorMessage('email');
  const emailRegex = /\S+@\S+\.\S+/;

  const password = document.getElementById('password');
  removeErrorMessage('password');
  /* const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/; */
  const numberRegex = /\d/;
  const specialRegex = /[!@#$%^&*(),.?":{}|<>]/;

  const passwordConfirmation = document.getElementById('password_confirmation');
  removeErrorMessage('password_confirmation');

  const errors = {};

  if (
    name.value === null
    || name.value.trim() === ''
  ) {
    errors.name = errorMessages.name.required;
  }

  if (email.value === null || email.value.trim() === '') {
    errors.email = errorMessages.email.required;
  } else if (!emailRegex.test(email.value)) {
    errors.email = errorMessages.email.email;
  }

  if (password.value === null || password.value.trim() === '') {
    errors.password = errorMessages.password.required;
  } else if (password.value.length < 8) {
    errors.password = errorMessages.password.min;
  } else if (!numberRegex.test(password.value)) {
    errors.password = errorMessages.password.number;
  } else if (!specialRegex.test(password.value)) {
    errors.password = errorMessages.password.special;
  } else if (passwordConfirmation.value !== password.value) {
    errors.password = errorMessages.password.confirmation;
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
