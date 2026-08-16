<?php

use App\Models\User;

test('the dashboard footer names the operating company', function () {
    $user = User::factory()->create();

    $this
        ->actingAs($user)
        ->get(route('dashboard'))
        ->assertOk()
        ->assertSeeText('Personal Alternative Funeral Services Limited');
});

test('the documentation pages name the operating company', function () {
    $user = User::factory()->create();

    $this
        ->actingAs($user)
        ->get(route('docs.getting-started'))
        ->assertOk()
        ->assertSeeText('Personal Alternative Funeral Services Limited');
});

test('the login page names the operating company', function () {
    $this
        ->get(route('login'))
        ->assertOk()
        ->assertSeeText('Personal Alternative Funeral Services Limited');
});

test('the footer no longer carries the upstream license and source links', function () {
    $user = User::factory()->create();

    $this
        ->actingAs($user)
        ->get(route('dashboard'))
        ->assertOk()
        ->assertDontSeeText('AGPL-3.0')
        ->assertDontSee('https://www.gnu.org/licenses/agpl-3.0.html', false)
        ->assertDontSee('https://github.com/lineledger/lineledger', false)
        ->assertDontSeeText('Local Foundry Inc.');
});
