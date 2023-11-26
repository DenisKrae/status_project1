<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\site;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $allesSeitenURL = $this->getAlleSeiteURL();
            return view('site.index', ['allesSeitenURL' => $allesSeitenURL]);
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function getAlleSeiteURL()
    {
        try {
            // Create instance of site model
            $siteModel = new site();

            // Get all columns values of seite_url
            $allesSeitenURL = $siteModel->select('seite_url', 'auftrag')->where('seite_url', '<>', '')->get();

            $allesSeitenAPIEndPoints = $allesSeitenURL->toArray();
            $successfulEndpoints = [];

            // Check if status response is Ok  
            foreach ($allesSeitenURL as $key => $item) {

                $seiteAPIEndPoint = $item['seite_url'] . '?_format=json';

                $response = Http::get($seiteAPIEndPoint);

                if ($response->status() == 200 || $response->successful()) {
                    // The request was successful (status code 200)
                    // Add the current item to the successfulEndpoints array
                    $successfulEndpoints[] = $item;
                } else {
                    continue;
                }
            }
            return $allesSeitenAPIEndPoints;
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
