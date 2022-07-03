<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\PhoneNumber;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PhoneNumbersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Contact $contact
     * @return Response
     */
    public function create(Contact $contact)
    {
        return Inertia::render('Contact/PhoneNumber/Create', [
            'contact' => $contact,
            'title' => 'Add Phone Number',
            'breadcrumbs' => [
                ['text' => 'Contacts', 'href' => '/contact', 'active' => false],
                ['text' => "{$contact->first_name} {$contact->last_name}", 'href' => "/contact/{$contact->id}", 'active' => false],
                ['text' => "Add Phone Number", 'href' => "/contact/{$contact->id}/phoneNumber/create", 'active' => true],
            ],
            'can' => [],
            'filters' => [],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Contact $contact
     * @return RedirectResponse
     */
    public function store(Request $request, Contact $contact)
    {
        $phoneNumber = PhoneNumber::query()->create(array_merge($request->all(), ['contact_id' => $contact->id]));

        return redirect()->to(route('contact.show', ['contact' => $contact]));
    }

    /**
     * Display the specified resource.
     *
     * @param PhoneNumber $phoneNumbers
     * @return \Illuminate\Http\Response
     */
    public function show(PhoneNumber $phoneNumbers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Contact $contact
     * @param PhoneNumber $phoneNumber
     * @return Response
     */
    public function edit(Contact $contact, PhoneNumber $phoneNumber)
    {
        return Inertia::render('Contact/PhoneNumber/Edit', [
            'contact' => $contact,
            'phoneNumber' => $phoneNumber,
            'title' => 'Update Phone Number',
            'breadcrumbs' => [
                ['text' => 'Contacts', 'href' => '/contact', 'active' => false],
                ['text' => "{$contact->first_name} {$contact->last_name}", 'href' => "/contact/{$contact->id}", 'active' => false],
                ['text' => "Update Phone Number", 'href' => "/contact/{$contact->id}/phoneNumber/{$phoneNumber->id}/edit", 'active' => true],
            ],
            'can' => [],
            'filters' => [],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Contact $contact
     * @param PhoneNumber $phoneNumber
     * @return RedirectResponse
     */
    public function update(Request $request, Contact $contact, PhoneNumber $phoneNumber)
    {
        $phoneNumber->fill($request->all())->save();

        return redirect()->to(route('contact.show', ['contact' => $contact]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contact $contact
     * @param PhoneNumber $phoneNumber
     * @return RedirectResponse
     */
    public function destroy(Contact $contact, PhoneNumber $phoneNumber): RedirectResponse
    {
        $phoneNumber->delete();

        return redirect()->to(route('contact.show', ['contact' => $contact]));
    }
}
