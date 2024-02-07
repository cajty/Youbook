<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;



class ReservationController extends Controller
{
    //


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'startDate' => ['required', 'date'],
            'endDate' => ['required', 'date', 'after:startDate'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }



        $available = Reservation::where('books_id', $request->bookId)
            ->where('start_time', '<', $request->endDate)
            ->where('end_time', '>', $request->startDate)
            ->count();


        if ($available > 0) {
            Session::flash('error', 'The book is already reserved ');
        } else {
            Reservation::create([
                'user_id' => 1,
                'books_id' =>   $request->bookId,
                'start_time' => $request->startDate,
                'end_time' => $request->endDate,
            ]);

            Session::flash('success', 'Reservation successful.');
        }

        return redirect()->back();
    }
}
