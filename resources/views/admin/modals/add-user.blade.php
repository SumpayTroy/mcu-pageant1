<!-- Add User Modal -->
<div class="modal-overlay" id="addModal" style="display:none;">
    <div class="modal">
        <div class="modal-header">
            <h3>Add User</h3>
            <button class="modal-close" onclick="closeAddModal()">&times;</button>
        </div>

        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}"
                        placeholder="Full name" required>
                    @error('name')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        placeholder="email@example.com" required>
                    @error('email')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <div class="password-wrapper">
                        <input type="password" name="password"
                            id="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Min. 8 characters">
                        <img src="/images/close_eye.png"
                            class="toggle-icon eye-closed"
                            alt="Hide"
                            onclick="togglePassword('password', this)" />
                        <img src="/images/open_eye.png"
                            class="toggle-icon eye-open"
                            alt="Show"
                            onclick="togglePassword('password', this)"
                            style="display:none;" />
                    </div>
                    <span id="password-error" class="form-error"></span>
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <div class="password-wrapper">
                        <input type="password" name="password_confirmation"
                            id="password_confirmation"
                            class="form-control"
                            placeholder="Repeat password">
                        <img src="/images/close_eye.png"
                            class="toggle-icon eye-closed"
                            alt="Hide"
                            onclick="togglePassword('password_confirmation', this)" />
                        <img src="/images/open_eye.png"
                            class="toggle-icon eye-open"
                            alt="Show"
                            onclick="togglePassword('password_confirmation', this)"
                            style="display:none;" />
                    </div>
                    <span id="confirm-error" class="form-error"></span>
                </div>

                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control @error('role') is-invalid @enderror">
                        <option value="">-- Select Role --</option>
                        @foreach(['admin', 'judge', 'tabulator', 'sas', 'guest'] as $r)
                            <option value="{{ $r }}" {{ old('role') == $r ? 'selected' : '' }}>
                                {{ ucfirst($r) }}
                            </option>
                        @endforeach
                    </select>
                    @error('role')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                        <option value="">-- Select Status --</option>
                        @foreach(['active', 'inactive', 'pending'] as $s)
                            <option value="{{ $s }}" {{ old('status') == $s ? 'selected' : '' }}>
                                {{ ucfirst($s) }}
                            </option>
                        @endforeach
                    </select>
                    @error('status')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn--outline" onclick="closeAddModal()">Cancel</button>
                <button type="submit" class="btn btn--primary">Add User</button>
            </div>
        </form>
    </div>
</div>
