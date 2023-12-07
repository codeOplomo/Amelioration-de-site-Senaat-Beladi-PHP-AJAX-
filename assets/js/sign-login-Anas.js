

try {
  const linksign = document.getElementById('link-sign');
  const loginsign = document.getElementById('link-login');
  const logForm = document.querySelector('.login-section');
  const signForm = document.querySelector('.sign-section');

  const emailInput = document.getElementById('log-email');
  const passwordInput = document.getElementById('log-pswd');

  const namesRegex = /^[a-zA-Z ]+$/;
  const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  const passwordRegex = /^[A-Za-z0-9!@#$%^&*()_+{}\[\]:;<>,.?~\\-]+$/;
  

  linksign.addEventListener('click', function (event) {
    event.preventDefault();

    logForm.classList.remove('activeForm');
    logForm.classList.add('desactiveForm');
    signForm.classList.remove('desactiveForm');
    signForm.classList.add('activeForm');

  })

  loginsign.addEventListener('click', function (event) {
    event.preventDefault();

    signForm.classList.remove('activeForm');
    signForm.classList.add('desactiveForm');
    logForm.classList.remove('desactiveForm');
    logForm.classList.add('activeForm');
  });

  function submitForm(form) {
  //Submit the form
  form.submit();
}

// Function to handle form submission with promise
function submitFormAsync(form) {
  return new Promise((resolve, reject) => {
      form.addEventListener('submit', (event) => {
          event.preventDefault();

          // Simulate asynchronous behavior (you can replace this with your actual form submission logic)
          setTimeout(() => {
              form.submit()
              resolve(); // Resolve the promise when the form submission is complete
          }, 500);
      });
  });
}


  //login validation
  const loginForm = document.querySelector('.login-section');

  loginForm.addEventListener('submit', function (event) {
    // event.preventDefault();

    const email = emailInput.value;
    const password = passwordInput.value;

    // if (emailRegex.test(email)) {
    //     emailInput.nextElementSibling.style.display='none';
    //   } else {
    //     emailInput.nextElementSibling.style.display='block';
    //   }

    //   if (passwordRegex.test(password)) {
    //     passwordInput.nextElementSibling.style.display='none';
    //   } else {
    //     passwordInput.nextElementSibling.style.display='block';
    //   }
    if (!emailRegex.test(email)) {
      emailInput.nextElementSibling.style.display = 'block';
      event.preventDefault();
    }

    if (!passwordRegex.test(password)) {
      passwordInput.nextElementSibling.style.display = 'block';
      event.preventDefault();
    }

  })

  //sign up validation
  // const signupForm = document.querySelector('.sign-section');
  const nameInput = document.getElementById('name');
  const emailInput2 = document.getElementById('sign-email');
  const passwordInput2 = document.getElementById('sign-pswd');
  const confirmInput2 = document.getElementById('confirm-pswd');

  signForm.addEventListener('keyup', async function (event) {
    // event.preventDefault();

    const name = nameInput.value;
    const email2 = emailInput2.value;
    const password2 = passwordInput2.value;

    if (namesRegex.test(name)) {
      nameInput.nextElementSibling.style.display = 'none';

      // You can redirect to another page or perform further actions here.
    } else {
      nameInput.nextElementSibling.style.display = 'block';

    }
    if (emailRegex.test(email2)) {
      emailInput2.nextElementSibling.style.display = 'none';

      // You can redirect to another page or perform further actions here.
    } else {
      emailInput2.nextElementSibling.style.display = 'block';
    }

    if (passwordRegex.test(password2)) {
      passwordInput2.nextElementSibling.style.display = 'none';

      // You can redirect to another page or perform further actions here.
    } else {
      passwordInput2.nextElementSibling.style.display = 'block';
    }
    // event.next();

    // await submitFormAsync(signForm);
    // submitForm(signForm);

    // Scroll to the login form
    loginForm.scrollIntoView({ behavior: 'smooth' });

    // Display the login form
    signForm.classList.remove('activeForm');
    signForm.classList.add('desactiveForm');
    loginForm.classList.remove('desactiveForm');
    loginForm.classList.add('activeForm');
    
  });

  // Function to handle form submission with promise
function submitFormAsync(form) {
  return new Promise((resolve, reject) => {
      form.addEventListener('submit', (event) => {
          event.preventDefault();

          // Simulate asynchronous behavior (you can replace this with your actual form submission logic)
          setTimeout(() => {
              form.submit();
              resolve(); // Resolve the promise when the form submission is complete
          }, 500);
      });
  });
}


  // signupForm.addEventListener('submit', function (event) {
    
  //   const name = nameInput.value;
  //   const email2 = emailInput2.value;
  //   const password2 = passwordInput2.value;

  //   if (!namesRegex.test(name)) {
  //     nameInput.nextElementSibling.style.display = 'block';
  //     event.preventDefault();
  //   }

  //   if (!emailRegex.test(email2)) {
  //     emailInput2.nextElementSibling.style.display = 'block';
  //     event.preventDefault();
  //   }

  //   if (!passwordRegex.test(password2)) {
  //     passwordInput2.nextElementSibling.style.display = 'block';
  //     event.preventDefault();
  //   }
  // });


  document.addEventListener('DOMContentLoaded', function () {

    const clientRadio = document.getElementById('flexRadioDefault1');
    const artisanRadio = document.getElementById('flexRadioDefault2');
    const clientFields = document.querySelector('.client-fields');
    const artisanFields = document.querySelector('.artisan-fields');

    function hideAllFields() {
      clientFields.classList.add('hidden');
      artisanFields.classList.add('hidden');
    }

    function showClientFields() {
      hideAllFields();
      clientFields.classList.remove('hidden');
    }

    function showArtisanFields() {
      hideAllFields();
      clientFields.classList.remove('hidden');
      artisanFields.classList.remove('hidden');
    }

    clientRadio.addEventListener('change', showClientFields);
    artisanRadio.addEventListener('change', showArtisanFields);
  });

  document.addEventListener('DOMContentLoaded', function () {
    const loginIsActiveForm = document.querySelector('.login-section.activeForm');

    const loginContainActive = loginIsActiveForm ? loginIsActiveForm : null;

    // const loginContainActive = loginIsActiveForm.classList.contains('activeForm') ? loginIsActiveForm : null;

    if (loginContainActive) {
      (loginContainActive).scrollIntoView({ behavior: 'smooth' });
    }
  });
} catch (error) {
  console.error(error);
}