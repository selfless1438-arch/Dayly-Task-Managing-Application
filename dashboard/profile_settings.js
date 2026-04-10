const profileCard = document.querySelector(".profile-card");

function profileDataFetch() {
    const username = $("#p_username").val();
    $.ajax({
        url: 'b_profile_data_fetch.php',
        type: "POST",
        data: { username: username },
        dataType: "json",
        success: function (data) {
            console.log(data);
            $("#userProfileImg").attr("src", data.profileImg);
            $("#role").html(data.role);
            $("#p_full_name").val(data.fullname);
            $("#p_email").val(data.email);
            $("#p_contact").val(data.contact);
            $("#gender").val(data.gender);
            $("#birth").val(data.birth);
            $("#address").val(data.address);
        }
    })
}
profileDataFetch();

function editProfile() {
    profileCard.classList.add("editing");
    const inputs = document.querySelectorAll("input");
    inputs.forEach(input => {
        input.removeAttribute("readonly");
    });
}

$("#newProfileImg").on("change", function () {
    let file = this.files[0];
    if (file) {
        $("#userProfileImg").attr("src", URL.createObjectURL(file));
    }
});

function cancelChanges() {
    location.reload();
}

function saveProfileChanges() {
    const data = {
        fullname: $("#p_full_name").val(),
        username: $("#p_username").val(),
        contact: $("#p_full_name").val(),
        gender: $("#p_full_name").val(),
        birth_date: $("#p_full_name").val(),
        address: $("#p_full_name").val(),
    }

    $.ajax({
        url: "b_update_profile.php",
        type: "POST",
        data: data,
        dataType: 'json',
        success: function (response) {
            Swal.fire({
                title: "Profile Updated.",
                icon: 'success',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                location.reload();
            });
        }
    });
}