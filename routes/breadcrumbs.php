<?php


Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});

Breadcrumbs::register('dashboard', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Dashboard', route('home'));
});

Breadcrumbs::register('user', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('User', route('user.index'));
});
