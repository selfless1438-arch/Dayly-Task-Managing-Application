const ctx = document.getElementById("pieChart");

new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Completed', 'Pending', 'In Process'],
        datasets: [{
            label: "Tasks",
            data: [12, 10, 2],
            backgroundColor: [
                '#22c55e',
                '#f59e0b',
                '#3b82f6'
            ],
            boderWidth: 0
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});

// line chart

const lineChart = document.getElementById("lineChart");

new Chart(lineChart, {
    type: 'line',
    data: {
        labels: ['01/04', '02/04', '03/04', '04/04', '05/04', '06/04', '07/04', '07/04', '08/04', '09/04', '10/04'],
        datasets: [{
            label: "Last 10 Days",
            data: [57, 23, 53, 23, 65, 23, 56, 23, 34, 12, 89],
            borderColor: '#3b82f6',
            backgroundColor: 'rgba(59,130,246,0.2)',
            tension: 0.4,
            fill: true,
            pointRadius: 5,
            pointBackgroundColor: '#3b82f6'
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom'
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                max: 100   // 👈 Set Maximum Value Here
            }
        }
    }
});


// tasks toggle
function loadTasks() {
    const taskBodyLoader = document.getElementById("taskBodyLoader");
    const tasksContBody = document.getElementById("tasksContBody");
    const username = $("#taskLoaderUser").val();
    $.ajax({
        url: "b_get_tasks.php",
        type: "Post",
        data: { username: username },
        dataType: "json",
        success: function (data) {
            if (data.length > 0) {
                let html = "";

                data.forEach(task => {
                    html += `
                        <div class="task-card ${task.status}" id="${task.id}">
                            <div class="upper">
                                <span class="heading">${task.taskTitle}</span>
                                <button type="button" onclick="toggleTask(${task.id})">
                                    <i data-lucide="chevron-down"></i>
                                </button>
                            </div>
                            <div class="lower">
                                <p class="desc">${task.taskDesc}</p>
                                <div class="btn-cont">
                                <button type="button" onclick="deleteTask(${task.id})">Delete</button>
                                    <button type="button">Done</button>
                                    <button type="button"  onclick="setInProcess(${task.id})">In Process</button>
                                </div>
                            </div>
                        </div>
                    `
                });
                tasksContBody.innerHTML = "";
                tasksContBody.innerHTML = html;
                taskBodyLoader.style.display = "none";
            } else {
                tasksContBody.innerHTML = "";
                let html = "<p>No task founded</p>";
                tasksContBody.innerHTML = html;
                taskBodyLoader.style.display = "none";
            }
            lucide.createIcons();
        }
    })
}

loadTasks();


// expangding 
function toggleTask(id) {
    const taskCard = document.getElementById(id);
    taskCard.classList.toggle("active");
}

function deleteTask(id) {
    Swal.fire({
        title: "Alert",
        text: "This will not be recovered",
        icon: "info",
        showCancelButton: true,
        cancelButtonColor: "#3b82f6",
        confirmButtonColor: "#ee3434ff",
        confirmButtonText: "Yes! Delete"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "b_delete_task.php",
                type: "Post",
                data: { id: id },
                dataType: "json",
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            title: "Deleted",
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1000
                        });
                    } else {
                        Swla.fire({
                            title: "Error",
                            text: "Failed to delete task",
                            icon: 'error',
                            confirmButtonText: "Try Again"
                        }).then(() => {
                            location.realod();
                        })
                    }
                }
            })
        }
    })
}