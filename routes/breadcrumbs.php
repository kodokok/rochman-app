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

Breadcrumbs::register('approval.show', function ($breadcrumbs) {
    $breadcrumbs->push('approval', route('approval.show'));
});
