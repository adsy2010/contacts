<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $contacts = Contact::query()
            ->withCount(['addresses', 'phoneNumbers'])
            ->paginate();


        return Inertia::render('Contact/Index', [
            'title' => "Contacts",
            'breadcrumbs' => [
                ['text' => 'Contacts', 'href' => '/contact', 'active' => true]
            ],
            'contacts' => $contacts,
            'can' => [],
            'filters' => []
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Contact/Create', [
            'title' => "Create contact",
            'breadcrumbs' => [
                ['text' => 'Contacts', 'href' => '/contact', 'active' => false],
                ['text' => "Create contact", 'href' => "/contact/create", 'active' => true],
            ],
            'can' => [],
            'filters' => [],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreContactRequest $request
     * @return RedirectResponse
     */
    public function store(StoreContactRequest $request): RedirectResponse
    {
        Contact::query()->create($request->all());

        return redirect()->to(route('contact.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Contact $contact
     * @return Response
     */
    public function show(Contact $contact): Response
    {
        return Inertia::render('Contact/Show', [
            'contact' => $contact->load('addresses', 'phoneNumbers'),
            'title' => "{$contact->first_name} {$contact->last_name}",
            'breadcrumbs' => [
                ['text' => 'Contacts', 'href' => '/contact', 'active' => false],
                ['text' => "{$contact->first_name} {$contact->last_name}", 'href' => "/contact/{$contact->id}", 'active' => true],
            ],
            'can' => [],
            'filters' => [],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Contact $contact
     * @return Response
     */
    public function edit(Contact $contact): Response
    {
        return Inertia::render('Contact/Edit', [
            'contact' => $contact->load('addresses', 'phoneNumbers'),
            'title' => "{$contact->first_name} {$contact->last_name}",
            'breadcrumbs' => [
                ['text' => 'Contacts', 'href' => '/contact', 'active' => false],
                ['text' => "{$contact->first_name} {$contact->last_name}", 'href' => "/contact/{$contact->id}", 'active' => false],
                ['text' => "Edit", 'href' => "/contact/{$contact->id}/edit", 'active' => true],
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
     * @return RedirectResponse
     */
    public function update(Request $request, Contact $contact): RedirectResponse
    {
        $contact->fill($request->all())->save();

        return redirect()->to(route('contact.show', ['contact' => $contact]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contact $contact
     * @return RedirectResponse
     */
    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();

        return back();
    }
}
