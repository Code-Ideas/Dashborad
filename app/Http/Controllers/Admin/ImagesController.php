<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Photo;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Article $article
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Article $article)
    {
        request()->validate([
            'image' => 'required|image|mimes:pdf,jpeg,jpg,png',
        ]);
        $file = $request->file('image');
        return response()->json([
            'success' => true,
            'result' => $article->storeImage($file->store('articles', 'public'), 'gallery')
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true
            ]);
        }

        return redirect()->back()->with('success', 'تم حذف الصورة بنجاح !');
    }
}
