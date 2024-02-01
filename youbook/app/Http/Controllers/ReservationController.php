<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    //
 

    public function stor(Request $request)
    {
        $request->validate([
            'startDate' => ['required', 'date'],
            'endDate' => ['required', 'date', 'after_or_equal:startDate'],
        
        ]);

      

        $available = Reservation::where('id_livre', $request->book_id)
                ->where('date_start', '<=', $request->endDate)
                ->where('date_fin', '>=', $request->startDate)
                ->count() == 0;

        if ($available) {
            Reservation::create([
                'id_livre' => $request->book_id,
                'id_user' => Auth::id(),
                'date_start' => $request->startDate,
                'date_fin' => $request->endDate,
                'statut' => 'reserved',
            ]);

            Session::flash('success', 'Reservation successful.');
        } else {
            Session::flash('error', 'The book is already reserved ');
        }

        return redirect("/details/book/$request->book_id");
    }
}
