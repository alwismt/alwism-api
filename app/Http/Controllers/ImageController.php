<?php

namespace App\Http\Controllers;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:2048',
        ]);
        $destinationPath = 'images/project/images';
        $path = Storage::put($destinationPath, $request->file('file'));

        return response()->json([
            'success' => true,
            'url' => $path
        ], 200);
        // }
        // return response()->json(['error' => 'Unauthenticated.'], 200);

    }
}
