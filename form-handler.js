
const form = document.getElementById('contactForm');

form.addEventListener('submit', function(event) {
    event.preventDefault();

    const errors = [];
    const phone = form.phone.value.trim();
    const captcha = form.captcha.value.trim();

    const phonePattern = /^\d{3}-\d{3}-\d{4}$/;

    if (!phonePattern.test(phone)) {
        errors.push("Formato de teléfono inválido. Usa 123-456-7890.");
    }

    if (captcha !== "1234") {
        errors.push("CAPTCHA incorrecto.");
    }

    const errorDiv = document.getElementById('errors');
    errorDiv.innerHTML = errors.join("<br>");

    if (errors.length > 0) return;

    const formData = new FormData(form);
    fetch(form.action, {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('response').innerHTML = data;
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
