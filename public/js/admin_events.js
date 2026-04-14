document.addEventListener('DOMContentLoaded', () => {
    // events-create
    const saveBtn = document.getElementById('saveEventBtn');
    if (saveBtn) {
        saveBtn.addEventListener('click', function() {
            this.disabled = true;
            this.form.submit();
        });
    }

    // events-edit
    const deleteBtn = document.getElementById('deleteBtn');
    const deleteForm = document.getElementById('deleteForm');
    const modal = document.getElementById('deleteModal');
    const confirmBtn = document.getElementById('confirmDelete');
    const cancelBtn = document.getElementById('cancelDelete');

    if (deleteBtn && deleteForm && modal) {
        deleteBtn.addEventListener('click', (e) => {
            e.preventDefault();
            modal.style.display = 'flex'; // show modal
        });
    }

    if (confirmBtn && deleteForm) {
        confirmBtn.addEventListener('click', () => {
            deleteForm.submit(); // submit delete form
        });
    }

    if (cancelBtn && modal) {
        cancelBtn.addEventListener('click', () => {
            modal.style.display = 'none'; // hide modal
        });
    }
});
