<!-- Edit User Modal -->
<div class="modal-overlay" id="editModal" style="display:none;">
    <div class="modal">
        <div class="modal-header">
            <h3>Edit User</h3>
            <button class="modal-close" onclick="closeEditModal()">&times;</button>
        </div>

        <form method="POST" action="" id="editForm">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="edit-name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" id="edit-email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Role</label>
                    <select name="role" id="edit-role" class="form-control">
                        <option value="guest">Guest</option>
                        <option value="admin">Admin</option>
                        <option value="judge">Judge</option>
                        <option value="tabulator">Tabulator</option>
                        <option value="sas">SAS</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" id="edit-status" class="form-control">
                        <option value="active">Active</option>
                        <option value="pending">Pending</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn--outline" onclick="closeEditModal()">Cancel</button>
                <button type="submit" class="btn btn--primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>

{{-- Hidden delete form --}}
<form method="POST" id="deleteForm" action="">
    @csrf
    @method('DELETE')
</form>

{{-- Delete Confirmation Modal --}}
<div id="deleteConfirmModal" class="modal-overlay" style="display:none;">
    <div class="modal" style="max-width:400px; text-align:center;">
        <div class="modal-body">
            <div style="font-size:3rem;">⚠️</div>
            <h3 style="margin:0.5rem 0;">Delete User?</h3>
            <p style="color:rgba(0,0,0,0.5); font-size:0.875rem;">
                This user will be moved to the archive and permanently deleted after <strong>30 days</strong>.
            </p>
        </div>
        <div class="modal-footer" style="justify-content:center; gap:0.5rem;">
            <button type="button" class="btn btn--outline" onclick="closeDeleteConfirm()">Cancel</button>
            <button type="button" class="btn btn--danger" onclick="submitDelete()">Yes, Delete</button>
        </div>
    </div>
</div>
