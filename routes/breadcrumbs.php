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

Breadcrumbs::register('roles', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('roles', route('roles.index'));
});
