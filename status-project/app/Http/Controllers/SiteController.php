<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatesiteRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\site;


class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('site.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('site.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'site' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'url_zu_git' => 'required|url|max:255',
            'auftrag' => 'required|in:Stundenbasiert (monatliche Abrechnung),Stundenbasiert (quartalweise Abrechnung),Pauschal mit Hosting(jährlich Abrechnung),Pauschal (jährliche Abrechnung)',
            'kommentare' => 'required|string',
        ]);
        try {
            // Start a database transaction
            DB::beginTransaction();
            // Logic to save data
            $siteModel = new site();  // Site model instance
            $siteModel->site = $request->site;
            $siteModel->seite_url = $request->url;
            $siteModel->url_zu_git = $request->url_zu_git;
            $siteModel->auftrag = $request->auftrag;
            $siteModel->kommentare = $request->kommentare;
            $siteModel->save();
            DB::commit();
            return redirect()->route('show.dashboard')->with('success', 'Formular erfolgreich abgeschickt!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(site $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatesiteRequest $request, site $site)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(site $site)
    {
        //
    }
}
