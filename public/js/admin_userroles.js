document.addEventListener('DOMContentLoaded', function () {

    // ── Search ──────────────────────────────────────
const searchInput = document.getElementById('userSearch');
const tableBody   = document.getElementById('userTableBody');
const noResults   = document.getElementById('noResults');

    if (searchInput) {
        searchInput.addEventListener('input', function () {
        const query = this.value.toLowerCase().trim();
        const rows  = tableBody.querySelectorAll('tr');
        let visibleCount = 0;

        rows.forEach(row => {
            const name  = row.cells[1]?.textContent.toLowerCase() ?? '';
            const email = row.cells[2]?.textContent.toLowerCase() ?? '';
            const role  = row.cells[3]?.textContent.toLowerCase() ?? '';

            const matches = !query || name.includes(query) || email.includes(query) || role.includes(query);
            row.style.display = matches ? '' : 'none';
            if (matches) visibleCount++;
        });

        noResults.style.display = visibleCount === 0 ? 'block' : 'none';
        });
        } else
        {console.error('Search input #userSearch not found!');}

    // ── Modals ──────────────────────────────────────
    function openEditModal(id, name, email, role, status) {
        document.getElementById('edit-name').value = name;
        document.getElementById('edit-email').value = email;
        document.getElementById('edit-role').value = role;
        document.getElementById('edit-status').value = status;
        document.getElementById('editForm').action = `/users/${id}`;
        document.getElementById('editModal').style.display = 'flex';
    }

    function closeEditModal() {
        document.getElementById('editModal').style.display = 'none';
    }

    function openAddModal() {
        document.getElementById('addModal').style.display = 'flex';
    }

    function closeAddModal() {
        document.getElementById('addModal').style.display = 'none';
    }

    document.getElementById('editModal').addEventListener('click', function(e){
        if(e.target === this) closeEditModal();
    });
    document.getElementById('addModal').addEventListener('click', function(e){
        if(e.target === this) closeAddModal();
    });

    // Make functions globally accessible
    window.openEditModal = openEditModal;
    window.closeEditModal = closeEditModal;
    window.openAddModal = openAddModal;
    window.closeAddModal = closeAddModal;

});
