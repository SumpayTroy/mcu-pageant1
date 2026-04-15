@extends('layouts.appLayout')

@section('title', 'User Archive')

@section('content')

<div class="page-header">
    <div>
        <div class="page-label">Admin Management</div>
        <h1 class="page-title">User Archive</h1>
        <div class="gold-line"></div>
    </div>
    <a href="{{ route('admin.user-roles') }}" class="btn btn--outline">← Back to Users</a>
</div>

@if(session('success'))
    <div class="alert-success">
        <span class="checkmark">✔</span>
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-header">
        <h2 class="card-title">Archived Users</h2>
        <span style="font-size:0.8rem; color:rgba(0,0,0,0.4);">
            Users are permanently deleted after 30 days
        </span>
    </div>

    <table class="tbl">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Deleted At</th>
                <th>Deletes In</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                @php
                    $daysLeft = max(0, 30 - (int) floor($user->deleted_at->diffInDays(now())));
                @endphp
                <tr>
                    <td class="td-strong">{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><span class="badge badge--{{ $user->role }}">{{ ucfirst($user->role) }}</span></td>
                    <td>{{ $user->deleted_at->format('M d, Y') }}</td>
                    <td>
                        <span style="color: {{ $daysLeft <= 5 ? '#dc2626' : 'inherit' }}">
                            {{ $daysLeft }} day(s)
                        </span>
                    </td>
                    <td style="display:flex; gap:0.5rem;">
                        {{-- Restore --}}
                        <form method="POST" action="{{ route('admin.users.restore', $user->id) }}">
                            @csrf
                            <button type="submit" class="btn btn--outline btn--sm">Restore</button>
                        </form>

                        {{-- Permanent Delete --}}
                        <form method="POST" action="{{ route('admin.users.force-delete', $user->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn--danger btn--sm"
                                onclick="return confirm('Permanently delete this user? This cannot be undone.')">
                                Delete Forever
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center; color:rgba(0,0,0,0.4);">
                        No archived users
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
