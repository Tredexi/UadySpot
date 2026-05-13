<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BenefitRating;
use Illuminate\Support\Facades\Auth;

class BenefitRatingController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5'
        ]);

        BenefitRating::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'benefit_id' => $id
            ],
            [
                'rating' => $request->rating
            ]
        );

        return back()->with('success', 'Calificación guardada');
    }
}
    //

