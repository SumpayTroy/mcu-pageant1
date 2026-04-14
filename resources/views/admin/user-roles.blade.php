@extends('layouts.appLayout')

@section('title', 'User Roles')

@section('content')

<div class="page-header">
    <div>
        <div class="page-label">Admin Management</div>
        <h1 class="page-title">User Roles</h1>
        <div class="gold-line"></div>
    </div>
    <button class="btn btn--gold" onclick="openAddModal()">+ Add User</button>
</div>

{{-- Role Summary --}}
<div class="role-summary">
    @foreach($roleCounts as $role => $count)
        <div class="role-pill">
            <span class="role-pill-icon">
                @switch($role)
                    @case('admin') 🛡️ @break
                    @case('judge') 👨‍⚖️ @break
                    @case('tabulator') 📋 @break
                    @case('sas') ⚙️ @break
                    @default 👁️
                @endswitch
            </span>
            <div>
                <div class="role-pill-count">{{ $count }}</div>
                <div class="role-pill-label">{{ ucfirst($role) }}</div>
            </div>
        </div>
    @endforeach
</div>

{{-- Users Table --}}
<div class="card">
    <div class="card-header">
        <h2 class="card-title">All Users</h2>
    </div>


    {{-- Top Bar: Search + Lines per page + Filters --}}
    <div class="table-top-bar">

        {{-- Search --}}
        <div class="search-wrap">
            <span class="search-icon">🔍</span>
            <input
                type="text"
                id="userSearch"
                class="search-input"
                placeholder="Search name, email or role…"
                autocomplete="off"
            >
        </div>

        {{-- Right side: Lines per page + Filters --}}
        <div class="table-top-right">
            <div class="lpp-wrap">
                <span class="lpp-label">Lines per page</span>
                <div class="lpp-select-wrap">
                    <select id="lppSelect" class="lpp-select" onchange="changePerPage(this.value)">
                        @foreach([10, 25, 50, 100] as $n)
                            <option value="{{ $n }}" {{ request('per_page', 10) == $n ? 'selected' : '' }}>
                                {{ $n }}
                            </option>
                        @endforeach
                    </select>
                    <span class="lpp-chevron">▾</span>
                </div>
            </div>

            <button class="btn-filters" onclick="toggleFilterPanel()">
                <svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect y="0" width="14" height="1.8" rx="0.9" fill="currentColor"/>
                    <rect x="2" y="4.6" width="10" height="1.8" rx="0.9" fill="currentColor"/>
                    <rect x="4" y="9.2" width="6" height="1.8" rx="0.9" fill="currentColor"/>
                </svg>
                Filters
            </button>
        </div>

    </div>

    {{-- Filter Panel (hidden by default) --}}
    <div id="filterPanel" class="filter-panel" style="display:none;">
        <div class="filter-group">
            <label class="filter-label">Role</label>
            <div class="filter-pills" id="roleFilters">
                @foreach(['sas','admin','tabulator','guest','judge'] as $r)
                    <button class="filter-pill" data-filter="role" data-value="{{ $r }}" onclick="toggleFilterPill(this)">
                        {{ ucfirst($r) }}
                    </button>
                @endforeach
            </div>
        </div>
        <div class="filter-group">
            <label class="filter-label">Status</label>
            <div class="filter-pills" id="statusFilters">
                @foreach(['active','inactive','pending'] as $s)
                    <button class="filter-pill" data-filter="status" data-value="{{ $s }}" onclick="toggleFilterPill(this)">
                        {{ ucfirst($s) }}
                    </button>
                @endforeach
            </div>
        </div>
        <button class="filter-clear" onclick="clearFilters()">Clear filters</button>
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
        <tbody id="userTableBody">
            @foreach($users as $user)
            <tr
                data-role="{{ $user->role }}"
                data-status="{{ $user->status }}"
            >
                <td>{{ $users->firstItem() + $loop->index }}</td>
                <td class="td-strong">{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><span class="badge badge--{{ $user->role }}">{{ ucfirst($user->role) }}</span></td>
                <td><span class="badge badge--{{ $user->status }}">{{ ucfirst($user->status) }}</span></td>
                <td>
                    <button class="btn btn--sm btn--outline"
                        onclick="openEditModal('{{ $user->id }}','{{ $user->name }}','{{ $user->email }}','{{ $user->role }}','{{ $user->status }}')">
                        Edit
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- No results message --}}
    <div id="noResults" style="display:none; text-align:center; padding: 2rem; color: rgba(0,0,0,0.35); font-size: 0.875rem;">
        No users found matching your search.
    </div>

    {{-- Bottom Bar: Showing X to Y + Pagination --}}
    <div class="table-bottom-bar">
        <span class="showing-text">
            Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries
        </span>
        <div class="pagination-wrap">

            {{-- Prev --}}
            @if($users->onFirstPage())
                <span class="pg-btn pg-btn--disabled">&#8249;</span>
            @else
                <a href="{{ $users->previousPageUrl() }}&per_page={{ request('per_page', 10) }}" class="pg-btn">&#8249;</a>
            @endif

            {{-- Page numbers --}}
            @php
                $currentPage = $users->currentPage();
                $lastPage    = $users->lastPage();
                $range = collect(range(1, $lastPage))->filter(fn($p) =>
                    $p === 1 || $p === $lastPage || abs($p - $currentPage) <= 1
                );
                $prev = null;
            @endphp

            @foreach($range as $page)
                @if($prev !== null && $page - $prev > 1)
                    <span class="pg-dots">…</span>
                @endif
                @php
                    $pageUrl = $users->url($page) . '&per_page=' . request('per_page', 10);
                @endphp
                <a href="{{ $pageUrl }}"
                   class="pg-btn {{ $page === $currentPage ? 'pg-btn--active' : '' }}">
                    {{ $page }}
                </a>
                @php $prev = $page; @endphp
            @endforeach

            {{-- Next --}}
            @if($users->hasMorePages())
                <a href="{{ $users->nextPageUrl() }}&per_page={{ request('per_page', 10) }}" class="pg-btn">&#8250;</a>
            @else
                <span class="pg-btn pg-btn--disabled">&#8250;</span>
            @endif

        </div>
    </div>
</div>

@include('admin.modals.add-user')
@include('admin.modals.edit-user')

{{-- JS Scripts --}}
@push('scripts')
<script src="{{ asset('js/admin_userroles.js') }}"></script>
<script>

    // ── Lines per page ──────────────────────────────────────────
    function changePerPage(value) {
        const url = new URL(window.location.href);
        url.searchParams.set('per_page', value);
        url.searchParams.set('page', 1);
        window.location.href = url.toString();
    }

    // ── Filter panel toggle ─────────────────────────────────────
    function toggleFilterPanel() {
        const panel = document.getElementById('filterPanel');
        panel.style.display = panel.style.display === 'none' ? 'flex' : 'none';
    }

    // ── Filter pills ────────────────────────────────────────────
    const activeFilters = { role: [], status: [] };

    function toggleFilterPill(btn) {
        const filter = btn.dataset.filter;
        const value  = btn.dataset.value;
        btn.classList.toggle('active');

        if (btn.classList.contains('active')) {
            activeFilters[filter].push(value);
        } else {
            activeFilters[filter] = activeFilters[filter].filter(v => v !== value);
        }
        applyFilters();
    }

    function applyFilters() {
        const rows = document.querySelectorAll('#userTableBody tr');
        let visible = 0;
        rows.forEach(row => {
            const role     = row.dataset.role;
            const status   = row.dataset.status;
            const roleOk   = activeFilters.role.length === 0   || activeFilters.role.includes(role);
            const statusOk = activeFilters.status.length === 0 || activeFilters.status.includes(status);
            const show     = roleOk && statusOk;
            row.style.display = show ? '' : 'none';
            if (show) visible++;
        });
        document.getElementById('noResults').style.display = visible === 0 ? 'block' : 'none';
    }

    function clearFilters() {
        activeFilters.role   = [];
        activeFilters.status = [];
        document.querySelectorAll('.filter-pill.active').forEach(p => p.classList.remove('active'));
        applyFilters();
    }

    // ── Modals ──────────────────────────────────────────────────
    function openEditModal(id, name, email, role, status) {
    document.getElementById('edit-name').value   = name;
    document.getElementById('edit-email').value  = email;
    document.getElementById('edit-role').value   = role;
    document.getElementById('edit-status').value = status;
    document.getElementById('editForm').action   = `/admin/users/${id}`;  // ← fix this
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

    // ============================================================
    // DOMContentLoaded — only for event listeners that need the
    // DOM to be ready (search input, modal backdrop clicks)
    // ============================================================
    document.addEventListener('DOMContentLoaded', function () {

        // ── Search ──────────────────────────────────────────────
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
        }

        // ── Modal backdrop click to close ───────────────────────
        document.getElementById('editModal').addEventListener('click', function (e) {
            if (e.target === this) closeEditModal();
        });
        document.getElementById('addModal').addEventListener('click', function (e) {
            if (e.target === this) closeAddModal();
        });

    });

</script>
@endpush
@endsection
