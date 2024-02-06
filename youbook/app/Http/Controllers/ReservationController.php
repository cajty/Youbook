<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Session;


class ReservationController extends Controller
{
    //
 

    public function store(Request $request)
    {
        $request->validate([
            'startDate' => ['required', 'date'],
            'endDate' => ['required', 'date', 'after_or_equal:startDate'],
        
        ]);



        $available = Reservation::where('id_livre', $request->book_id)
                ->where('start_time', '<=', $request->endDate)
                ->where('end_time', '>=', $request->startDate)
                ->count() == 0;

        if ($available) {
            Reservation::create([
                'user_id' => $request->book_id,
                'books_id' => 1,
                'start_time' => $request->startDate,
                'end_time' => $request->endDate,
            ]);

            Session::flash('success', 'Reservation successful.');
        } else {
            Session::flash('error', 'The book is already reserved ');
        }

        return redirect("/$request->book_id");
    }
}
