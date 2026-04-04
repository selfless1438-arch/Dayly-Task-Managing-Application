function closeModal(id) {
    const modal = document.getElementById(id);
    modal.classList.remove("show");
}

function openModal(id) {
    const modal = document.getElementById(id);
    modal.classList.add("show");
}