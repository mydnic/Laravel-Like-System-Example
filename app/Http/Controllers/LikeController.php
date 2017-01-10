<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function likeProduct($id)
    {
        // here you can check if product exists or is valid or whatever

        $this->handleLike('App\Product', $id);

        return redirect()->back();
    }

    public function likePost($id)
    {
        // here you can check if product exists or is valid or whatever

        $this->handleLike('App\Post', $id);

        return redirect()->back();
    }

    public function handleLike($type, $id)
    {
        $existing_like = Like::withTrashed()->whereLikeableType($type)->whereLikeableId($id)->whereUserId(Auth::id())->first();

        if (is_null($existing_like)) {
            Like::create([
                'user_id'       => Auth::id(),
                'likeable_id'   => $id,
                'likeable_type' => $type,
            ]);
        } else {
            if (is_null($existing_like->deleted_at)) {
                $existing_like->delete();
            } else {
                $existing_like->restore();
            }
        }
    }
}
