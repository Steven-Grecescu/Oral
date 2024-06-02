const menuToggle = document.querySelector('.btn');
const showcase = document.querySelector('.showcase');
const menuClose = document.querySelector('.closeMenu');

menuToggle.addEventListener('click', () => {
    menuToggle.classList.toggle('active');
    showcase.classList.toggle('active');
})

menuClose.addEventListener('click', () => {
    menuToggle.classList.remove('active');
    showcase.classList.remove('active');
})

//========================================================================================

let currentIndex = 0;

function showSlide(index) {
    const slides = document.querySelectorAll('.carousel-item');
    if (index >= slides.length) {
        currentIndex = 0;
    } else if (index < 0) {
        currentIndex = slides.length - 1;
    } else {
        currentIndex = index;
    }
    slides.forEach((slide, i) => {
        slide.classList.remove('active');
        if (i == currentIndex) {
            slide.classList.add('active');
        }
    });
    const offset = -currentIndex * 100;
    document.querySelector('.carousel-inner').style.transform = `translateX(${offset}%)`;
}

function nextSlide() {
    showSlide(currentIndex + 1);
}

function prevSlide() {
    showSlide(currentIndex - 1);
}

setInterval(nextSlide, 5000);

//===========================================================================================

    document.getElementById('registrationForm').addEventListener('submit', function(event) {
    let nom = document.querySelector('input[name="nom"]').value
    let	prenom = document.querySelector('input[name=prenom]').value
    let adresse = document.querySelector('input[name=adresse]').value
    let tel = document.querySelector('input[name=phone]').value
    let email = document.querySelector('input[name=email]').value
    let password = document.querySelector('input[name="mdp"]').value;
    let confirmPassword = document.querySelector('input[name="mdp_confirm"]').value;

    if (nom === "") {
        alert("Veuillez entrer un nom.");
        event.preventDefault();
        return false;
    }
    if (prenom === "") {
        alert("Veuillez entrer un prénom.");
        event.preventDefault();
        return false;
    }
    if (adresse === "") {
        alert("Veuillez entrer une adresse.");
        event.preventDefault();
        return false;
    }
    if (tel === "") {
        alert("Veuillez entrer un numéro de téléphone.");
        event.preventDefault();
        return false;
    }else if (!/^0[567]\d{8}$/.test(tel)) {
        alert("Le numéro de téléphone doit comporter 10 chiffres et commencer par 05, 06 ou 07.");
        event.preventDefault();
        return false;
    }
    if (email === "") {
        alert("Veuillez entrer une adresse e-mail.");
        event.preventDefault();
        return false;
    }else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        alert("Veuillez entrer une adresse e-mail valide.");
        event.preventDefault();
        return false
    }

    if (password !== confirmPassword) {
        alert("Les mots de passe ne correspondent pas.");
        event.preventDefault();
        return false;
    }else if (password.length < 8) {
        alert("Le mot de passe doit comporter au moins 8 caractères.");
        event.preventDefault();
        return false;
    } else if (!/[A-Z]/.test(password)) {
        alert("Le mot de passe doit comporter au moins une majuscule.");
        event.preventDefault();
        return false;
    } else if (!/[a-z]/.test(password)) {
        alert("Le mot de passe doit comporter au moins une minuscule.");
        event.preventDefault();
        return false;
    } else if (!/[0-9]/.test(password)) {
        alert("Le mot de passe doit comporter au moins un chiffre.");
        event.preventDefault();
        return false;
    } else if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
        alert("Le mot de passe doit comporter au moins un caractère spécial.");
        event.preventDefault();
        return false;
    }
});