<?php

namespace App\Http\Controllers;

use App\Dislike;
use Illuminate\Support\Facades\Auth;

class DislikeController extends Controller
{
    public function dislikeProduct($id)
    {
        // here you can check if product exists or is valid or whatever

        $this->handledisLike('App\Post', $id);
        return redirect()->back();
    }

    public function dislikePost($id)
    {
        // here you can check if product exists or is valid or whatever

        $this->handledisLike('App\Post', $id);
        return redirect()->back();
    }

    public function handledisLike($type, $id)
    {
        $existing_dislike = Dislike::withTrashed()->wheredislikeableType($type)->wheredisLikeableId($id)->whereUserId(Auth::id())->first();

        if (is_null($existing_dislike)) {
            Dislike::create([
                'user_id'       => Auth::id(),
                'dislikeable_id'   => $id,
                'dislikeable_type' => $type,
            ]);
        } else {
            if (is_null($existing_dislike->deleted_at)) {
                $existing_dislike->delete();
            } else {
                $existing_dislike->restore();
            }
        }
    }
}
