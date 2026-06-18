<?php
it('requires a valid email address', function () {
    /** @var Tests\TestCase $this */

    $this->post('/register', [
        'name' => 'Uzayr',
        'email' => 'InvalidEmail123',
        'password' => 'Pasword123!',
    ])->assertSessionHasErrors('email');
});
