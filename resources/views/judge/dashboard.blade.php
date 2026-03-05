@extends('layouts.appLayout')

@section('title', 'Judge — Dashboard')

@section('content')

<div class="page-header">
    <div>
        <div class="page-label">Judge Panel</div>
        <h1 class="page-title">Dashboard</h1>
        <div class="gold-line"></div>
    </div>
    <div class="page-badge">🎭 MCU Pageant 2025</div>
</div>

<div class="canvas-grid">

    <div class="canvas-card">
        <div class="canvas-icon">📝</div>
        <div class="canvas-label">Segments to Score</div>
        <div class="canvas-value">3</div>
    </div>

    <div class="canvas-card">
        <div class="canvas-icon">✅</div>
        <div class="canvas-label">Completed</div>
        <div class="canvas-value">1</div>
    </div>

    <div class="canvas-card">
        <div class="canvas-icon">⏳</div>
        <div class="canvas-label">Remaining</div>
        <div class="canvas-value">2</div>
    </div>

    <div class="canvas-card canvas-card--highlight">
        <div class="canvas-icon">🔴</div>
        <div class="canvas-label">Current Segment</div>
        <div class="canvas-value">Formal</div>
    </div>

</div>

<div class="canvas-placeholder">
    <div class="canvas-placeholder-icon">⚖️</div>
    <div class="canvas-placeholder-text">Judge dashboard content goes here</div>
</div>

@endsection
