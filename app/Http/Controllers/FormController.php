<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\FormSubmission;

class FormController extends Controller
{
    public function showForm()
    {
        return view('form');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'message' => 'required|string',
            'media' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $mediaPath = null;
        if ($request->hasFile('media')) {
            $mediaPath = $request->file('media')->store('uploads', 'public');
        }

        $formSubmission = FormSubmission::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'media_path' => $mediaPath,
        ]);

        // Send Email
        Mail::send('emails.formSubmission', ['formSubmission' => $formSubmission], function ($message) use ($formSubmission) {
            $message->to('recipient@example.com')
                    ->subject('New Form Submission');
            if ($formSubmission->media_path) {
                $message->attach(storage_path('app/public/' . $formSubmission->media_path));
            }
        });

        // Return back to the form page with success message
        return back()->with('success', 'Form submitted successfully!');
    }
}
