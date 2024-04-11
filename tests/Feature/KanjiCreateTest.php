<?php

test('example', function () {
    $response = $this->post('/kanjis');

    $response->assertStatus(302);
});
