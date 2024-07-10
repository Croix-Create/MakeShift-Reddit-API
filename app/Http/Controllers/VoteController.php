<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{

    public function create($id)
    {
        $votableType = request()->get('votable_type'); // Get votable type parameter
    
        if ($votableType === 'App\Models\Comment') {
            $totalUpvotes = DB::table('votes')
                ->where('votable_id', $id)
                ->where('votable_type', 'App\Models\Comment')
                ->sum('upvote');
    
            $totalDownvotes = DB::table('votes')
                ->where('votable_id', $id)
                ->where('votable_type', 'App\Models\Comment')
                ->sum('downvote');
        } elseif ($votableType === 'App\Models\Post') {
            $totalUpvotes = DB::table('votes')
                ->where('votable_id', $id)
                ->where('votable_type', 'App\Models\Post')
                ->sum('upvote');
    
            $totalDownvotes = DB::table('votes')
                ->where('votable_id', $id)
                ->where('votable_type', 'App\Models\Post')
                ->sum('downvote');
        } else {
            // Handle invalid votable_type (optional)
            return response()->json(['error' => 'Invalid votable type'], 400);
        }
    
        return response()->json([
            'total_upvotes' => $totalUpvotes,
            'total_downvotes' => $totalDownvotes,
        ]);
    }

    public function store(Request $request, $id)
    {
        $vote = $request->get('vote'); // -1 for downvote, 1 for upvote
        $user = new User();

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

        // Update votable's vote count 
        $votable = app($votableType)->find($votableId);
        $votable->vote_count = $votable->votes()->sum('vote');
        $votable->save();

        return response()->json(['message' => 'Vote successful']);
    }
}
