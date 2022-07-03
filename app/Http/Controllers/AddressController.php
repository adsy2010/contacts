<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function index(Contact $contact)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create(Contact $contact)
    {
        return Inertia::render('Contact/Address/Create', [
            'contact' => $contact,
            'title' => 'Add Address',
            'breadcrumbs' => [
                ['text' => 'Contacts', 'href' => '/contact', 'active' => false],
                ['text' => "{$contact->first_name} {$contact->last_name}", 'href' => "/contact/{$contact->id}", 'active' => false],
                ['text' => "Add Address", 'href' => "/contact/{$contact->id}/address/create", 'active' => true],
            ],
            'can' => [],
            'filters' => [],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Contact $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Contact $contact)
    {
        $address = Address::query()->create(array_merge($request->all(), ['contact_id' => $contact->id]));

        return redirect()->to(route('contact.show', ['contact' => $contact]));
    }

    /**
     * Display the specified resource.
     *
     * @param Contact $contact
     * @param \App\Models\Address $address
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact, Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Contact $contact
     * @param \App\Models\Address $address
     * @return \Inertia\Response
     */
    public function edit(Contact $contact, Address $address)
    {
        return Inertia::render('Contact/Address/Edit', [
            'contact' => $contact,
            'address' => $address,
            'title' => 'Update Address',
            'breadcrumbs' => [
                ['text' => 'Contacts', 'href' => '/contact', 'active' => false],
                ['text' => "{$contact->first_name} {$contact->last_name}", 'href' => "/contact/{$contact->id}", 'active' => false],
                ['text' => "Update Address", 'href' => "/contact/{$contact->id}/address/{$address->id}/edit", 'active' => true],
            ],
            'can' => [],
            'filters' => [],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Contact $contact
     * @param \App\Models\Address $address
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Contact $contact, Address $address)
    {
        $address->fill($request->all())->save();

        return redirect()->to(route('contact.show', ['contact' => $contact]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contact $contact
     * @param \App\Models\Address $address
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Contact $contact, Address $address)
    {
        $address->delete();

        return redirect()->to(route('contact.show', ['contact' => $contact]));
    }
}
