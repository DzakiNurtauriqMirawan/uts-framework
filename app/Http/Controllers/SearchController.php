<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        // Lakukan pencarian di database atau logika pencarian lainnya
        $results = []; // Hasil pencarian sebagai contoh
        
        // Kembalikan hasil ke view
        return view('user.search', ['results' => $results, 'query' => $query]);
    }
}
