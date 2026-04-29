<?php

use ACBr\Laravel\Models\AcbrCompany;
use ACBr\Laravel\Models\AcbrDocument;
use ACBr\Laravel\Tests\Fixtures\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;

uses(RefreshDatabase::class);

beforeEach(function () {
    // Create users table manually for testing
    Schema::create('users', function ($table) {
        $table->id();
        $table->timestamps();
    });
});

test('it can create an acbr company and link to a user', function () {
    $user = User::create();
    
    $company = new AcbrCompany([
        'name' => 'Test Company',
        'cnpj' => '12345678000199',
    ]);
    
    $user->acbrCompany()->save($company);
    
    expect($user->acbrCompany)->not->toBeNull();
    expect($user->acbrCompany->name)->toBe('Test Company');
});

test('it can access documents through the trait', function () {
    $user = User::create();
    
    $company = $user->acbrCompany()->create([
        'name' => 'Test Company',
        'cnpj' => '12345678000199',
    ]);
    
    $document = $company->documents()->create([
        'type' => 'NFe',
        'status' => 'approved',
    ]);
    
    expect($user->acbrDocuments)->toHaveCount(1);
    expect($user->acbrDocuments->first()->type)->toBe('NFe');
});
