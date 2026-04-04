<div class="modal show" id="addNewTask">
    <div class="modal-dialogue">
        <div class="modal-header">
            <span class="title">Add New Task</span>
            <button type="button" onclick="closeModal('addNewModal')">
                <i data-lucide="x"></i>
            </button>
        </div>
        <div class="modal-body">
            <form action="">
                <div class="input-cont">
                    <label for="taskTitle">Title</label>
                    <input type="text" name="taskTitle" id="taskTitle">
                </div>
                <div class="input-cont">
                    <label for="taskDesc">Description</label>
                    <input type="text" name="taskDesc" id="taskDesc">
                </div>
                <button type="button" onclick="submitNewTask()">Add</button>
            </form>
        </div>
    </div>
</div>