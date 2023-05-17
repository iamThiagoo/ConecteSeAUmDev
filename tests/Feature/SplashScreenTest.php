<?php

it('check if home page is working', function () {
    $response = $this->get('/');
    $response->assertStatus(200);
});

it('check if SplashScreen Component is working', function () {
    $this->get('/')->assertSeeLivewire('components.splash-screen');
});