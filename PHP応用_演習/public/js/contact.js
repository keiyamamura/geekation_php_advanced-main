validate_form();
function validate_form() {
	const $inputs = document.querySelectorAll('.validate-target');
	const $form  = document.querySelector('.validate-form');

	if (!$form) {
		return;
	}

	for (const $input of $inputs) {
		$input.addEventListener('input', e => {
			$target = e.currentTarget;
			$feedback = $target.nextElementSibling;

			activateSubmitBtn($form);

			if (!$feedback.classList.contains('invalid-feedback')) {
				return;
			}

			if ($target.checkValidity()) {
				$target.classList.add('is-valid');
				$target.classList.remove('is-invalid');
				$feedback.textContent = '';
			} else {
				$target.classList.add('is-invalid');
				$target.classList.remove('is-valid');

				if ($target.validity.valueMissing) {
					$feedback.textContent = '値の入力が必須です。';
				} else if ($target.validity.tooLong) {
					$feedback.textContent = $target.maxLength + '文字以下で入力してください。現在の文字数は' + $target.value.length + '文字です。';
				} else if ($target.validity.patternMismatch && $target.id === 'tel') {
					$feedback.textContent = 'ハイフン無しで、半角数字のみで入力してください。';
				} else if ($target.validity.patternMismatch && $target.id === 'email') {
					$feedback.textContent = 'メールアドレスの正しい形式で入力してください。';
				}
			}
		});
	}

	activateSubmitBtn($form);
}

function activateSubmitBtn($form) {
	const $submitBtn = $form.querySelector('[type="submit"]');

	if ($form.checkValidity()) {
		$submitBtn.removeAttribute('disabled');
	} else {
		$submitBtn.setAttribute('disabled', true);
	}
}
