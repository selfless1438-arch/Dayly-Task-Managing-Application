function closeModal(id) {
    const modal = document.getElementById(id);
    modal.classList.remove("show");
}

function openModal(id) {
    const modal = document.getElementById(id);
    modal.classList.add("show");
}

function submitNewTask() {
    if ($("#taskTitle").val().trim().length === 0) {
        $("#taskTitle").addClass("alert");
        $("#taskTitle").focus();
        return;
    }
    const data = {
        username: $("#taskUser").val(),
        taskTitle: $("#taskTitle").val(),
        taskDesc: $("#taskDesc").val(),
    }
    if ($("#taskUser").val().length === 0) {
        alert("username not founded")
        return;
    }
    $.ajax({
        url: "b_add_new_task.php",
        type: "Post",
        data: data,
        dataType: "json",
        success: function (response) {
            if (response.success) {
                Swal.fire({
                    title: "Task Added",
                    text: "New Task Added Succesfully",
                    icon: "success",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Add More",
                }).then((result) => {
                    if (result.isConfirmed) {
                        openModal("addNewTask");
                        $("#addNewTask form")[0].reset();
                    } else {
                        location.reload();
                    }
                })
            } else {

            }
        }
    })
}