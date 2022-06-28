<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(): \Inertia\Response
    {
        $contacts = Contact::query()
            ->withCount(['addresses', 'phoneNumbers'])
            ->paginate();


        return Inertia::render('Contact/Index', [
            'contacts' => $contacts,
            'can' => [],
            'filters' => []
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create(): \Inertia\Response
    {
        return Inertia::render('Contact/Create', [
            'can' => [],
            'filters' => [],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        Contact::query()->create($request->all());

        return redirect()->to(route('contact.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Inertia\Response
     */
    public function show(Contact $contact): \Inertia\Response
    {
        return Inertia::render('Contact/Create', [
            'contact' => $contact->load('addresses', 'phoneNumbers'),
            'can' => [],
            'filters' => [],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Inertia\Response
     */
    public function edit(Contact $contact): \Inertia\Response
    {
        return Inertia::render('Contact/Edit', [
            'contact' => $contact->load('addresses', 'phoneNumbers'),
            'can' => [],
            'filters' => [],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Contact $contact): \Illuminate\Http\RedirectResponse
    {
        $contact->fill($request->all());

        return redirect()->to(route('contact.show', ['contact' => $contact->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Contact $contact): \Illuminate\Http\RedirectResponse
    {
        $contact->delete();

        return back();
    }
}
