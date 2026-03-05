@extends('layouts.appLayout')

@section('title', 'Dashboard')

@section('content')

<div class="page-header">
    <div>
        <div class="page-label">Welcome back</div>
        <h1 class="page-title">Dashboard</h1>
        <div class="gold-line"></div>
    </div>
    <div class="page-badge">🎭 MCU Pageant 2025</div>
</div>

{{-- Stat Cards --}}
<div class="stats-grid">

    <div class="stat-card">
        <div class="stat-icon">👥</div>
        <div class="stat-value">24</div>
        <div class="stat-label">Contestants</div>
        <div class="stat-sub">Registered & active</div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">👨‍⚖️</div>
        <div class="stat-value">6</div>
        <div class="stat-label">Judges</div>
        <div class="stat-sub">Assigned this event</div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">📝</div>
        <div class="stat-value">3</div>
        <div class="stat-label">Segments</div>
        <div class="stat-sub">Swimwear · Formal · Q&A</div>
    </div>

    <div class="stat-card stat-card--highlight">
        <div class="stat-icon">🏆</div>
        <div class="stat-value">Live</div>
        <div class="stat-label">Event Status</div>
        <div class="stat-sub stat-sub--live">● Scoring in progress</div>
    </div>

</div>

{{-- Two columns --}}
<div class="two-col">

    {{-- Recent Activity --}}
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Recent Activity</h2>
        </div>
        <div class="act-list">

            <div class="act-item">
                <div class="act-icon">📝</div>
                <div>
                    <div class="act-text">Judge 2 submitted scores for <strong>Segment 1</strong></div>
                    <div class="act-time">2 minutes ago</div>
                </div>
            </div>

            <div class="act-item">
                <div class="act-icon">👤</div>
                <div>
                    <div class="act-text">Contestant <strong>#07 — Maria Santos</strong> was updated</div>
                    <div class="act-time">15 minutes ago</div>
                </div>
            </div>

            <div class="act-item">
                <div class="act-icon">🏆</div>
                <div>
                    <div class="act-text">Leaderboard recalculated after segment close</div>
                    <div class="act-time">1 hour ago</div>
                </div>
            </div>

            <div class="act-item">
                <div class="act-icon">👥</div>
                <div>
                    <div class="act-text"><strong>3 new contestants</strong> registered</div>
                    <div class="act-time">Yesterday, 4:30 PM</div>
                </div>
            </div>

        </div>
    </div>

    {{-- Top 3 Leaderboard Preview --}}
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Top Contestants</h2>
            <span class="card-header-sub">After Segment 1</span>
        </div>
        <div class="lb-preview">

            <div class="lb-row lb-row--1">
                <span class="lb-rank">🥇</span>
                <div class="lb-info">
                    <div class="lb-name">Ana Reyes</div>
                    <div class="lb-rep">College of Nursing</div>
                </div>
                <div class="lb-score">94.5</div>
            </div>

            <div class="lb-row lb-row--2">
                <span class="lb-rank">🥈</span>
                <div class="lb-info">
                    <div class="lb-name">Clara Mendoza</div>
                    <div class="lb-rep">College of Education</div>
                </div>
                <div class="lb-score">91.2</div>
            </div>

            <div class="lb-row lb-row--3">
                <span class="lb-rank">🥉</span>
                <div class="lb-info">
                    <div class="lb-name">Sofia Cruz</div>
                    <div class="lb-rep">College of Business</div>
                </div>
                <div class="lb-score">89.8</div>
            </div>

        </div>
    </div>

</div>

@endsection
