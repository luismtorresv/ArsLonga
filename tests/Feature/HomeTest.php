<?php

/**
 * @author Luis Torres
 */
test('home page view can be rendered', function () {
    $view = $this->view('home.index');

    $view->assertSee('Welcome!');
});

test('home page returns a successful response', function () {
    $response = $this->get('/');

    $response->assertOk();
});

test('home page uses the correct view', function () {
    $response = $this->get('/');

    $response->assertViewIs('home.index');
});
