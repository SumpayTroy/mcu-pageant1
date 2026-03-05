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
                <td><button class="btn btn--sm btn--outline">Edit</button></td>
            </tr>

            <tr>
                <td>2</td>
                <td class="td-strong">Jose Rizal</td>
                <td>judge1@mcu.edu.ph</td>
                <td><span class="badge badge--judge">Judge</span></td>
                <td><span class="badge badge--active">Active</span></td>
                <td><button class="btn btn--sm btn--outline">Edit</button></td>
            </tr>

            <tr>
                <td>3</td>
                <td class="td-strong">Gabriela Silang</td>
                <td>judge2@mcu.edu.ph</td>
                <td><span class="badge badge--judge">Judge</span></td>
                <td><span class="badge badge--active">Active</span></td>
                <td><button class="btn btn--sm btn--outline">Edit</button></td>
            </tr>

            <tr>
                <td>4</td>
                <td class="td-strong">Andres Bonifacio</td>
                <td>tabulator1@mcu.edu.ph</td>
                <td><span class="badge badge--tabulator">Tabulator</span></td>
                <td><span class="badge badge--pending">Pending</span></td>
                <td><button class="btn btn--sm btn--outline">Edit</button></td>
            </tr>

        </tbody>
    </table>

</div>

@endsection
