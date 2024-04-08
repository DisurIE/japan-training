<?php
use Inertia\Testing\AssertableInertia as Assert;
use Pest\Laravel;

it('renders public pages', function (string $path, string $component) {

    $this->get($path)
        ->assertOk()
        ->assertInertia(fn(Assert $page) => $page->component($component));

})->with([
    [
        'path' => '/',
        'component' => 'Main',
    ],
]);
