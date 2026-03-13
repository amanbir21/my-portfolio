<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Validate inputs
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // Send email
        Mail::send([], [], function($message) use ($data) {
            $message->to('amanuelcompa55@gmail.com') // Your Gmail
                    ->from('amanuelcompa55@gmail.com', 'Amanuel Kassa Portfolio')
                    ->subject("New Contact Message from {$data['name']}")
                    ->setBody(
                        "<h2>New Message from Portfolio Contact Form</h2>
                        <p><strong>Name:</strong> {$data['name']}</p>
                        <p><strong>Message:</strong><br>{$data['message']}</p>",
                        'text/html'
                    );
        });

        return response()->json(['message' => 'Message sent successfully!']);
    }
}