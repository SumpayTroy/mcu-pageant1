@extends('layouts.appLayout')

@section('title', 'SAS — Dashboard')

@section('content')

<div class="page-header">
    <div>
        <div class="page-label">Student Affairs & Services</div>
        <h1 class="page-title">Dashboard</h1>
        <div class="gold-line"></div>
    </div>
    <div class="page-badge">🎭 MCU Pageant 2025</div>
</div>

<div class="canvas-grid">

    <div class="canvas-card">
        <div class="canvas-icon">👥</div>
        <div class="canvas-label">Contestants</div>
        <div class="canvas-value">24</div>
    </div>

    <div class="canvas-card">
        <div class="canvas-icon">🏫</div>
        <div class="canvas-label">Colleges</div>
        <div class="canvas-value">8</div>
    </div>

    <div class="canvas-card">
        <div class="canvas-icon">📋</div>
        <div class="canvas-label">Segments</div>
        <div class="canvas-value">3</div>
    </div>

    <div class="canvas-card canvas-card--highlight">
        <div class="canvas-icon">🔴</div>
        <div class="canvas-label">Event Status</div>
        <div class="canvas-value">Live</div>
    </div>

</div>

<div class="canvas-placeholder">
    <div class="canvas-placeholder-icon">🎓</div>
    <div class="canvas-placeholder-text">SAS dashboard content goes here</div>
</div>

@endsection
