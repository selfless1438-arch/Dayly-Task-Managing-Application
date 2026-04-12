const profileCard = document.querySelector(".profile-card");

function profileDataFetch() {
    const username = $("#p_username").val();
    $.ajax({
        url: 'b_profile_data_fetch.php',
        type: "POST",
        data: { username: username },
        dataType: "json",
        success: function (data) {
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
    const textare = document.querySelector("#address");
    textare.removeAttribute("readonly");
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

    var formData = new FormData();

    formData.append("fullname", $("#p_full_name").val());
    formData.append("username", $("#p_username").val());
    formData.append("contact", $("#p_contact").val());
    formData.append("gender", $("#gender").val());
    formData.append("birth_date", $("#birth").val());
    formData.append("address", $("#address").val());

    // Image
    var image = $("#newProfileImg")[0].files[0];
    formData.append("newProfileImg", image);

    $.ajax({
        url: "b_update_profile.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json',

        success: function (response) {
            if (response.success) {
                Swal.fire({
                    title: "Profile Updated.",
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire({
                    title: "Error",
                    text: "Failed to update",
                    icon: "error"
                });
            }
        }
    });
}