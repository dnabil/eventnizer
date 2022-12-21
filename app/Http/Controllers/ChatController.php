<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;

class ChatController extends Controller
{

    public function viewChat()
    {
        //masih page static
        return view('chat', [
            'merchant' => Merchant::inRandomOrder()->with(['city', 'province', 'user'])->first(),
        ]);
    }
}
