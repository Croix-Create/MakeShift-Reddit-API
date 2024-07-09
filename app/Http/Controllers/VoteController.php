<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;

class VoteController extends Controller
{
    public function vote(Request $request, $id)
    {
        $vote = $request->get('vote'); // -1 for downvote, 1 for upvote
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'You must be logged in to vote'], 401);
        }

        $votableType = $request->get('votable_type'); //  "App\Models\Comment" or "App\Models\Post"
        $votableId = $id;

        // Check votable
        $existingVote = Vote::where('user_id', $user->id)
                            ->where('votable_id', $votableId)
                            ->where('votable_type', $votableType)
                            ->first();

        if ($existingVote) {
            
            $existingVote->vote = $vote;
            $existingVote->save();
        } else {
            
            $newVote = new Vote;
            $newVote->user_id = $user->id;
            $newVote->votable_id = $votableId;
            $newVote->votable_type = $votableType;
            $newVote->vote = $vote;
            $newVote->save();
        }

        // Update votable's vote count (can be optimized with database triggers)
        $votable = app($votableType)->find($votableId); // Use Laravel's service container to resolve the model instance
        $votable->vote_count = $votable->votes()->sum('vote');
        $votable->save();

        return response()->json(['message' => 'Vote successful']);
    }
}
