const profileCard = document.querySelector(".profile-card");

function editProfile() {
    profileCard.classList.add("editing");
    const inputs = document.querySelectorAll("input");
    inputs.forEach(input => {
        input.removeAttribute("readonly");
    });
}

function cancelChanges() {
    location.reload();
}