<?php

namespace App\Http\Controllers;

use App\Models\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QueryController extends Controller
{
   public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'mobilenumber' => 'required|string|min:10|max:15',
        'message' => 'required|string',
    ]);

    $date = now()->format('Ymd');
    $mobileStart = substr($validatedData['mobilenumber'], 0, 3);
    $referencenumber = $date . $mobileStart;

    Query::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'mobilenumber' => $validatedData['mobilenumber'],
        'usermessage' => $validatedData['message'],
        'referencenumber' => $referencenumber,
    ]);

    return response()->json([
        'message' => 'Query submitted successfully.',
        'reference' => $referencenumber,
    ]);
}

}
