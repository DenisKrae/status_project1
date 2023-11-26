<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class DrupalStatusController extends Controller
{
    public function fetchDrupalStatus() {
        $response = Http::get('http://dennis1234.de/api/modules-themes');
        $data = $response->json();
        return view ('drupal-status', ['data' => ($data)]);
    }
}

