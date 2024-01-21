/*
 * @requirement: DWECL - #12 Validación de formularios
 * @requirement: DWECL - #15 DOM
 */
document.getElementById('checkout-confirmation').addEventListener('submit', (e) => {
  const acceptanceCheckbox = document.getElementById('acceptance');
  const errorContainer = document.getElementById('acceptance-container');

  const oldErrorMessage = document.getElementById('acceptance-error');
  if (oldErrorMessage) {
      oldErrorMessage.remove();
  }

  if (!acceptanceCheckbox.checked) {
      e.preventDefault();

      const errorMessage = document.createElement('p');
      errorMessage.id = 'acceptance-error';
      errorMessage.textContent = 'Debes marcar esta casilla para continuar.';
      errorMessage.classList.add('text-sm', 'text-red-600', 'mt-2');

      errorContainer.appendChild(errorMessage);
  }
});
