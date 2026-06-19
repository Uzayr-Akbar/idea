<?php

declare(strict_types=1);
use Tests\TestCase;

it('requires a valid email address', function () {
    /** @var TestCase $this */
    $this->post('/register', [
        'name' => 'Uzayr',
        'email' => 'InvalidEmail123',
        'password' => 'Pasword123!',
    ])->assertSessionHasErrors('email');
});
