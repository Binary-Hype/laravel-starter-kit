<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Laravel\Fortify\Features;

uses(RefreshDatabase::class);

it('can register a user', function () {
    Notification::fake();

    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $response->assertStatus(302);
    $response->assertRedirect('/dashboard');

    $this->assertDatabaseHas('users', [
        'email' => 'test@example.com',
    ]);

    $user = User::where('email', 'test@example.com')->first();

    expect(Hash::check('password', $user->password))->toBeTrue();
});

it('can login a user', function () {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => Hash::make('password'),
    ]);

    $response = $this->post('/login', [
        'email' => 'test@example.com',
        'password' => 'password',
    ]);

    $response->assertStatus(302);
    $response->assertRedirect('/dashboard');

    $this->assertAuthenticatedAs($user);
});


it('can logout a user', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $response = $this->post('/logout');

    $response->assertStatus(302);
    $response->assertRedirect('/');

    $this->assertGuest();
});

it('can request a password reset link', function () {
    Notification::fake();

    $user = User::factory()->create([
        'email' => 'test@example.com',
    ]);

    $response = $this->post('/forgot-password', [
        'email' => 'test@example.com',
    ]);

    $response->assertStatus(302);

    Notification::assertSentTo($user, \Illuminate\Auth\Notifications\ResetPassword::class);
});


it('can reset a user password', function () {
    $user = User::factory()->create([
        'email' => 'test@example.com',
    ]);

    $token = Password::createToken($user);

    $response = $this->post('/reset-password', [
        'email' => 'test@example.com',
        'token' => $token,
        'password' => 'newpassword',
        'password_confirmation' => 'newpassword',
    ]);

    $response->assertStatus(302);
    $response->assertRedirect('/login');

    $user->refresh();

    expect(Hash::check('newpassword', $user->password))->toBeTrue();
});
