<?php

Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('home', route('home'));
});

Breadcrumbs::register('dashboard', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('dashboard', route('home'));
});

Breadcrumbs::register('user', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('user', route('user.index'));
});

Breadcrumbs::register('user.create', function ($breadcrumbs) {
    $breadcrumbs->parent('user');
    $breadcrumbs->push('create', route('user.create'));
});

Breadcrumbs::register('user.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('user');
    $breadcrumbs->push('edit');
});

Breadcrumbs::register('user.profile', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('user profile');
});

Breadcrumbs::register('roles', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('roles', route('roles.index'));
});

Breadcrumbs::register('departemen', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('departemen', route('departemen.index'));
});

Breadcrumbs::register('kompetensi', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('kompetensi auditor', route('kompetensi.index'));
});

Breadcrumbs::register('klausul', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('klausul');
});

Breadcrumbs::register('auditplan', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('audit plan', route('auditplan.index'));
});

Breadcrumbs::register('auditplan.create', function ($breadcrumbs) {
    $breadcrumbs->parent('auditplan');
    $breadcrumbs->push('create');
});

Breadcrumbs::register('auditplan.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('auditplan');
    $breadcrumbs->push('edit');
});

Breadcrumbs::register('auditplan.show', function ($breadcrumbs) {
    $breadcrumbs->parent('auditplan');
    $breadcrumbs->push('show');
});

Breadcrumbs::register('temuanaudit', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('temuan audit', route('temuanaudit.index'));
});

Breadcrumbs::register('temuanaudit.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('temuanaudit');
    $breadcrumbs->push('edit');
});

Breadcrumbs::register('laporan', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('laporan');
});

// Breadcrumbs::register('laporan.temuanaudit', function ($breadcrumbs) {
//     $breadcrumbs->parent('home');
//     $breadcrumbs->push('laporan temuan audit');
// });

// Breadcrumbs::register('laporan.temuanaudit-preview', function ($breadcrumbs) {
//     $breadcrumbs->parent('laporan.temuanaudit');
//     $breadcrumbs->push('preview');
// });

// Breadcrumbs::register('laporan.kompetensi', function ($breadcrumbs) {
//     $breadcrumbs->parent('home');
//     $breadcrumbs->push('laporan kompetensi auditor');
// });

// Breadcrumbs::register('laporan.kompetensi-preview', function ($breadcrumbs) {
//     $breadcrumbs->parent('laporan.kompetensi');
//     $breadcrumbs->push('preview');
// });

