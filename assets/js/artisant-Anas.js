// document.addEventListener("DOMContentLoaded", function() {
//     const burgerIcon = document.getElementById("burger-icon");
//     const navbar = document.querySelector(".navbar-collapse");

//     burgerIcon.addEventListener("click", function() {
//         navbar.classList.toggle("show-menu");
//     });
// });

// document.addEventListener("DOMContentLoaded", function() {
//     const burgerIcon = document.getElementById("burger-icon");
//     const closeIcon = document.getElementById("close-icon");
//     const navbar = document.querySelector(".navbar-collapse");

//     burgerIcon.addEventListener("click", function() {
//         burgerIcon.style.display = "none";
//         closeIcon.style.display = "block";
//         navbar.style.display = "block"; // Show the navigation links
//     });

//     closeIcon.addEventListener("click", function() {
//         closeIcon.style.display = "none";
//         burgerIcon.style.display = "block";
//         navbar.style.display = "none"; // Hide the navigation links
//     });
// });

let leftpic = document.getElementById("ech-pic1");
leftpic.addEventListener('mouseover', function () {
    leftpic.src = './img/ech4.jpg';
})
leftpic.addEventListener('mouseout', function () {
    leftpic.src = './img/ech1.png';
})

let middlepic = document.getElementById("ech-pic2");
middlepic.addEventListener('mouseover', function () {
    middlepic.src = './img/ech5.jpg';
})
middlepic.addEventListener('mouseout', function () {
    middlepic.src = './img/ech2.png';
})
let rightpic = document.getElementById("ech-pic3");
rightpic.addEventListener('mouseover', function () {
    rightpic.src = './img/ech6.jpg';
})
rightpic.addEventListener('mouseout', function () {
    rightpic.src = './img/ech3.png';
})


//show-less    show-more
var toggleLink = document.querySelectorAll(".toggleLink");

toggleLink.forEach(function (button) {
    button.addEventListener("click", toggleContent);
});

function toggleContent(event) {
    event.preventDefault();

    var targetId = this.getAttribute("data-target");
    var content = document.getElementById(targetId);

    if (content.style.maxHeight !== "none") {
        content.style.maxHeight = "none";
        this.innerText = "Voir moin";
    } else {
        content.style.maxHeight = "10vh";
        this.innerText = "Voir plus";
    }
}

//sign button
document.getElementById('sign-btn').addEventListener('click', function () {
    window.location.href = './sign-login-Anas.html';
});
//marketplace buttons
document.getElementById('marketplaceBtn').addEventListener('click', function () {
    window.location.href = './marketplace.html';
});

document.getElementById('marketLink').addEventListener('click', function () {
    window.location.href = './marketplace.html';
});

//footer button 
document.getElementById('footer-logo').addEventListener('click', function () {
    window.location.href = './index.html';
});

//sign up validation

const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

const signupForm = document.querySelector('.sign-form');
const emailInput = document.getElementById('email');

signupForm.addEventListener('submit', function (event) {
    event.preventDefault();

    const email = emailInput.value;


    if (emailRegex.test(email)) {
        emailInput.nextElementSibling.style.display = 'none';

        // You can redirect to another page or perform further actions here.
    } else {
        emailInput.nextElementSibling.style.display = 'block';
    }

})

