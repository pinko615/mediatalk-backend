<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Likeable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Likeable  $likeable
     * @return \Illuminate\Http\Response
     */
    public function show(Likeable $likeable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Likeable  $likeable
     * @return \Illuminate\Http\Response
     */
    public function edit(Likeable $likeable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Likeable  $likeable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Likeable $likeable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Likeable  $likeable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Likeable $likeable)
    {
        //
    }

    public function addPostLike($id, Request $request)
    {
        {
            $user_id = Auth::id();
            $body = $request;
            $post_id =$body['post_id'];
            $post = Post::find($post_id);
            $likes = $post->likes()->where('user_id',$user_id)->get();
            if($likes->isNotEmpty()){
                return response([
                    'message' => 'Only one like per post'
                ],400);
            }
            $post->likes()->create(['user_id'=>$user_id]);
            return response([
                'message' => 'You give a Like'
            ],201);
        }
    }
    // public function addCommnetLike($id, Request $request)
    // {
    //     {
    //         $user_id = Auth::id();
    //         $comment = Comment::find($id);
    //         $likes = $comment->likes()->where('user_id',$user_id)->get();
    //         if($likes->isNotEmpty()){
    //             return response([
    //                 'message' => 'Cant give more than one like per post'
    //             ],400);
    //         }
    //         $comment->likes()->create(['user_id'=>$user_id]);
    //         return response([
    //             'message' => 'thanks u ',
    //             'likes' => $likes
    //         ],201);
    //     }
    // }
}
