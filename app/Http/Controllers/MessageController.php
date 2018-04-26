<?php

namespace App\Http\Controllers;

use App\House;
use App\Message;
use App\Http\Requests\MessageRequest;

class MessageController extends Controller
{
    public function store(MessageRequest $request, House $house)
    {
        Message::create([
            'house_id' => $house->id,
            'guest_name' => $request->guest_name,
            'guest_email' => $request->guest_email,
            'guest_phone' => $request->guest_phone,
            'guest_message' => $request->guest_message,
        ]);

        alert()->success('Successfully', 'Message Sent Successfully');

        return back();
    }
}
