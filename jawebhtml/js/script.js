const video = document.getElementById("myVideo");
const soundIcon = document.getElementById("audioId")
const mutedIcon = document.getElementById("mutedId")

document.addEventListener("DOMContentLoaded", () => {
    video.play()  
    
});


const render = () => {
    if (video.muted == true ) {
        video.muted = false
        soundIcon.classList.remove("invisible")
        mutedIcon.classList.add("invisible")

    } else {
        video.muted = true
        soundIcon.classList.add("invisible")
        mutedIcon.classList.remove("invisible")
    }
}

const login = document.getElementById("lgn-redt")

login.addEventListener("click", () => {
    location.href = "login.php"
})

const openModalButtons = document.querySelectorAll('[data-modal-target]')
const closeModalButtons = document.querySelectorAll('[data-close-button]')
const overlay = document.getElementById('overlay')

openModalButtons.forEach(button => {
    button.addEventListener('click', () => {
        const modal = document.querySelector(button.dataset.modalTarget)
        openModal(modal)
    })
})

overlay.addEventListener('click', () => {
    const modals = document.querySelectorAll('.modal.active')
    modals.forEach(modal => {
        closeModal(modal)
    })
})

closeModalButtons.forEach(button => {
    button.addEventListener('click', () => {
        const modal = button.closest('.modal')
        closeModal(modal)
    })
})

function openModal(modal) {
    if (modal == null) return
    modal.classList.add('active')
    overlay.classList.add('active')
}

function closeModal(modal) {
    if (modal == null) return
    modal.classList.remove('active')
    overlay.classList.remove('active')
}
