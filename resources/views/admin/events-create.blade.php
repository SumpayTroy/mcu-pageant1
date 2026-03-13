@extends('layouts.appLayout')

@section('content')

<div class="page-header">

    <div>
        <div class="page-label">Admin Panel</div>
        <h1 class="page-title">Create Event</h1>
        <div class="gold-line"></div>
    </div>

    <a href="/admin/events" class="btn btn--outline">← Back</a>

</div>

<div class="event-form-layout">

    {{-- Left: Event Details --}}
    <div class="event-form-main">

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Event Details</h2>
            </div>

            <div class="form-group">
                <label class="form-label">Event Name</label>
                <input type="text" class="form-input" placeholder="e.g. MCU Pageant 2025">
            </div>

            <div class="form-group">
                <label class="form-label">Status</label>
                <select class="form-input">
                    <option value="upcoming">Upcoming</option>
                    <option value="live">Live</option>
                    <option value="done">Done</option>
                </select>
            </div>

            <div class="form-actions">
                <button class="btn btn--gold">Save Event</button>
            </div>

        </div>

    </div>

    {{-- Right: Assign Judges & SAS --}}
    <div class="event-form-side">

        {{-- Judges --}}
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Judges</h2>
                <button class="btn btn--outline btn--sm">+ Assign</button>
            </div>

            <div class="assigned-list">
                <div class="assigned-empty">No judges assigned yet</div>
            </div>
        </div>

        {{-- SAS --}}
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">SAS</h2>
                <button class="btn btn--outline btn--sm">+ Assign</button>
            </div>

            <div class="assigned-list">
                <div class="assigned-empty">No SAS assigned yet</div>
            </div>
        </div>

    </div>

</div>

@endsection
