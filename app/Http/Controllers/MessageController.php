<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;

class MessageController extends Controller
{
    public function index()
    {
        // Fetch all messages and pass to view
        $messages = Form::orderBy('created_at', 'desc')->get();
        
        // Debug the data
        // dd($messages); // Uncomment this to check if data is being retrieved
        
        return view('admin.message', [
            'messages' => $messages
        ]);
    }
}