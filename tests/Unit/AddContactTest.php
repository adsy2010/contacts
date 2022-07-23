<?php

use Inertia\Testing\AssertableInertia as Assert;

class AddContactTest extends \Tests\TestCase
{
    use \Illuminate\Foundation\Testing\DatabaseMigrations;

    public function test_add_contact_with_first_and_last_name()
    {
        $this->followRedirects = true;

        $data = ['first_name' => 'Bob', 'last_name' => 'Smith'];

        $this->assertCount(0, \App\Models\Contact::query()->where($data)->get());

        $response = $this->postJson('/contact', $data);

        $response->assertInertia(fn(Assert $page) => $page->component('Contact/Index'));

        $this->assertGreaterThan(0, \App\Models\Contact::query()->where($data)->count());

        $this->assertSame(
            $data,
            \App\Models\Contact::query()
                ->firstWhere($data)
                ->only('first_name', 'last_name')
        );
    }

    public function test_add_contact_with_all_details()
    {
        $this->followRedirects = true;

        $data = [
            'first_name' => 'Barry',
            'last_name' => 'Scott',
            'email' => 'barry.scott@example.com',
            'date_of_birth' => \Carbon\Carbon::parse('1977-02-03')
        ];

        $this->assertCount(0, \App\Models\Contact::query()->where($data)->get());

        $response = $this->postJson('/contact', $data);

        $response->assertInertia(fn(Assert $page) => $page->component('Contact/Index'));

        $this->assertGreaterThan(0, \App\Models\Contact::query()->where($data)->count());

        $contact = \App\Models\Contact::query()
            ->firstWhere($data);

        $this->assertSame(
            collect($data)->only('first_name', 'last_name', 'email')->toArray(),
            $contact->only('first_name', 'last_name', 'email')
        );

        $this->assertNotSame($data['date_of_birth'], $contact->only('date_of_birth'));

        $contactDateOfBirthArray = $contact->only('date_of_birth');

        $this->assertSame($data['date_of_birth']->toDateString(), $contactDateOfBirthArray['date_of_birth']->toDateString());
    }

    public function test_add_contact_with_no_first_name()
    {
        $this->followRedirects = true;

        $data = ['first_name' => null, 'last_name' => 'Smith'];

        $this->assertCount(0, \App\Models\Contact::query()->where($data)->get());

        $response = $this->postJson('/contact', $data);

        $response->assertJsonValidationErrors(['first_name']);

        $this->assertCount(0, \App\Models\Contact::query()->where($data)->get());
    }

    public function test_add_contact_with_no_last_name()
    {
        $this->followRedirects = true;

        $data = ['first_name' => 'Bob', 'last_name' => null];

        $this->assertCount(0, \App\Models\Contact::query()->where($data)->get());

        $response = $this->postJson('/contact', $data);

        $response->assertJsonValidationErrors(['last_name']);

        $this->assertCount(0, \App\Models\Contact::query()->where($data)->get());
    }

    public function test_add_contact_with_malformed_email_address()
    {
        $this->followRedirects = true;

        $data = ['first_name' => 'Bob', 'last_name' => 'Smith', 'email' => 'bob@@smith'];

        $this->assertCount(0, \App\Models\Contact::query()->where($data)->get());

        $response = $this->postJson('/contact', $data);

        $response->assertJsonValidationErrors(['email']);

        $this->assertCount(0, \App\Models\Contact::query()->where($data)->get());

    }

    public function test_add_contact_with_malformed_date_of_birth()
    {
        $this->followRedirects = true;

        $data = ['first_name' => 'Bob', 'last_name' => 'Smith', 'date_of_birth' => '18222-45-01'];

        $this->assertCount(0, \App\Models\Contact::query()->where($data)->get());

        $response = $this->postJson('/contact', $data);

        $response->assertJsonValidationErrors(['date_of_birth']);

        $this->assertCount(0, \App\Models\Contact::query()->where($data)->get());

    }

}
