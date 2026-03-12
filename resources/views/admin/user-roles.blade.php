@extends('layouts.appLayout')

@section('title', 'User Roles')

@section('content')

<div class="page-header">
    <div>
        <div class="page-label">Management</div>
        <h1 class="page-title">User Roles</h1>
        <div class="gold-line"></div>
    </div>
    <button class="btn btn--gold">+ Add User</button>
</div>

{{-- Role summary pills --}}
<div class="role-summary">

    <div class="role-pill">
        <span class="role-pill-icon">🛡️</span>
        <div>
            <div class="role-pill-count">1</div>
            <div class="role-pill-label">Admin</div>
        </div>
    </div>

    <div class="role-pill">
        <span class="role-pill-icon">👨‍⚖️</span>
        <div>
            <div class="role-pill-count">6</div>
            <div class="role-pill-label">Judges</div>
        </div>
    </div>

    <div class="role-pill">
        <span class="role-pill-icon">📋</span>
        <div>
            <div class="role-pill-count">2</div>
            <div class="role-pill-label">Tabulators</div>
        </div>
    </div>

    <div class="role-pill">
        <span class="role-pill-icon">👁️</span>
        <div>
            <div class="role-pill-count">—</div>
            <div class="role-pill-label">Audience</div>
        </div>
    </div>

</div>

{{-- Users table --}}
<div class="card">
    <div class="card-header">
        <h2 class="card-title">All Users</h2>
    </div>

    <table class="tbl">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td class="td-strong">Test D. Luffy</td>
                <td>admin@mcu.edu.ph</td>
                <td><span class="badge badge--admin">Admin</span></td>
                <td><span class="badge badge--active">Active</span></td>
                <td>
                    <button class="btn btn--sm btn--outline"
                    onclick="openEditModal(1, 'Test D. Luffy', 'admin@mcu.edu.ph', 'admin', 'Active')">Edit</button>
                </td>
            </tr>

            <tr>
                <td>2</td>
                <td class="td-strong">Jose Rizal</td>
                <td>judge1@mcu.edu.ph</td>
                <td><span class="badge badge--judge">Judge</span></td>
                <td><span class="badge badge--active">Active</span></td>
                <td>
                    <button class="btn btn--sm btn--outline"
                        onclick="openEditModal(2, 'Jose Rizal', 'judge1@mcu.edu.ph', 'judge', 'Active')">Edit</button>
                </td>
            </tr>

            <tr>
                <td>3</td>
                <td class="td-strong">Gabriela Silang</td>
                <td>judge2@mcu.edu.ph</td>
                <td><span class="badge badge--judge">Judge</span></td>
                <td><span class="badge badge--active">Active</span></td>
                <td><button class="btn btn--sm btn--outline"
                    onclick="openEditModal(3, 'Gabriela Silang', 'judge2@mcu.edu.ph', 'judge', 'Active' )">Edit</button></td>
            </tr>

            <tr>
                <td>4</td>
                <td class="td-strong">Andres Bonifacio</td>
                <td>tabulator1@mcu.edu.ph</td>
                <td><span class="badge badge--tabulator">Tabulator</span></td>
                <td><span class="badge badge--pending">Pending</span></td>
                <td><button class="btn btn--sm btn--outline"
                    onclick="openEditModal(4, 'Andres Bonifacio','tabulator1@mcu.edu.ph','tabulator', 'Pending')">Edit</button></td>
            </tr>

        </tbody>
    </table>

</div>


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
                                            <option value="admin">Admin</option>
                                            <option value="judge">Judge</option>
                                            <option value="tabulator">Tabulator</option>
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

{{-- At the bottom of user-roles.blade.php, before </x-applayout> or </body> --}}

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {

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

        // Close when clicking outside modal
        document.getElementById('editModal').addEventListener('click', function (e) {
            if (e.target === this) closeEditModal();
        });

        // Make functions globally accessible (needed by onclick in HTML)
        window.openEditModal = openEditModal;
        window.closeEditModal = closeEditModal;

    });
</script>
@endpush

@endsection
