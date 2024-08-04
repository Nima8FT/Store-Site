<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Requests\Admin\Content\CommentRequest;
use Illuminate\Http\Request;
use App\Models\Content\Comment;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::where('commentable_type', 'App\Models\Content\Post')->orderBy('created_at', 'desc')->simplePaginate(10);
        return view("admin.content.comment.index", compact("comments"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = Comment::find($id);
        if (!$comment->seen) {
            $comment->seen = 1;
            $comment->save();
        }
        return view("admin.content.comment.show", compact("comment"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function status(Comment $comment)
    {
        $comment->status = $comment->status === 0 ? 1 : 0;
        $result = $comment->save();
        if ($result) {
            if ($comment->status === 0) {
                return response()->json([
                    'status' => true,
                    'checked' => false
                ]);
            } else if ($comment->status === 1) {
                return response()->json([
                    'status' => true,
                    'checked' => true
                ]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }

    public function approved(Comment $comment)
    {
        $comment->approved = $comment->approved === 0 ? 1 : 0;
        $result = $comment->save();
        if ($result) {
            if ($comment->approved) {
                return redirect()->route('content.comment.index')->with('swal-success', 'نظر با موفقیت تایید شد');
            } else {
                return redirect()->route('content.comment.index')->with('swal-success', 'نظر با موفقیت عدم تایید شد');
            }
        } else {
            return redirect()->route('content.comment.index')->with('swal-error', 'با خطا مواجه شده ایید');
        }
    }

    public function answer(Comment $comment, CommentRequest $commentRequest)
    {
        if (!$comment->parent) {
            $inputs = $commentRequest->all();
            $inputs['parent_id'] = $comment->id;
            $inputs['commentable_id'] = $comment->commentable_id;
            $inputs['commentable_type'] = $comment->commentable_type;
            $inputs['approved'] = 1;
            $inputs['status'] = 1;
            $inputs['author_id'] = 1;
            $comment = Comment::create($inputs);
            return redirect()->route('content.comment.index')->with('toast-success', 'پاسخ شما با موفقیت ثبت شد');
        } else {
            return redirect()->route('content.comment.index')->with('toast-error', 'با مشکل مواجه شدید');
        }
    }

}
