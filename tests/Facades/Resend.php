<?php

use Resend\Client;
use Resend\Laravel\Facades\Resend;
use Resend\Service\ApiKey;
use Resend\Service\Domain;
use Resend\Service\Email;

it('resolves Resend client', function () {
    $app = app();

    $app->get('config')->set('resend', [
        'api_key' => 'test',
    ]);

    expect(Resend::getFacadeRoot())->toBeInstanceOf(Client::class);
});

it('can get an API service', function () {
    $app = app();

    $app->get('config')->set('resend', [
        'api_key' => 'test',
    ]);

    expect(Resend::apiKeys())->toBeInstanceOf(ApiKey::class)
        ->and(Resend::domains())->toBeInstanceOf(Domain::class)
        ->and(Resend::emails())->toBeInstanceOf(Email::class);
});
