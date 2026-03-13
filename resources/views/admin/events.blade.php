@extends('layouts.appLayout')

@section('content')

<div class="page-header">
    <div>
        <div class="page-label">Admin Panel</div>
        <h1 class="page-title">Events</h1>
        <div class="gold-line"></div>
    </div>
    <a href="/admin/events/create" class="btn btn--gold">+ Add Event</a>
</div>

<div class="events-list">

    @foreach($events as $event)
    <div class="event-item">

        <div class="event-item-left">
            <div class="event-status-dot event-status-dot--{{ $event->status }}"></div>
            <div>
                <div class="event-name">{{ $event->eventName }}</div>
                <div class="event-meta">{{ $event->contestants()->count() }} contestants</div>
            </div>
        </div>

        <div class="event-item-right">
            <span class="badge badge--{{ $event->status }}">{{ ucfirst($event->status) }}</span>
            <div class="event-actions">
                <button class="event-dots" onclick="toggleMenu(this)">⋯</button>
                <div class="event-dropdown">
                    <a href="/admin/events/{{ $event->id }}/edit" class="event-dropdown-item">✏️ Edit</a>
                    <button class="event-dropdown-item event-dropdown-item--danger">🗑️ Delete</button>
                </div>
            </div>
        </div>

    </div>
    @endforeach

</div>

@endsection

@push('scripts')
<script>
    function toggleMenu(btn) {
        const dropdown = btn.nextElementSibling;
        const allDropdowns = document.querySelectorAll('.event-dropdown');

        allDropdowns.forEach(d => {
            if (d !== dropdown) d.classList.remove('open');
        });

        dropdown.classList.toggle('open');
    }

    document.addEventListener('click', function(e) {
        if (!e.target.classList.contains('event-dots')) {
            document.querySelectorAll('.event-dropdown').forEach(d => d.classList.remove('open'));
        }
    });
</script>
@endpush
