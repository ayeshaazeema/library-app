<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    public function getAuthor($id)
    {
        return Authors::findOrFail($id);
    }

    public function createAuthor(Request $request)
    {
        $data = $request->all();

        try {
            $author = new Authors();
            $author->name = $data['name'];
            $author->description = $data['description'];
            $author->url = $data['url'];

            // Buat save ke database
            $author->save();
            $status = 'success';
            return response()->json(compact('status', 'author'), 200);
        } catch (\Throwable $th) {
            $status = 'error';
            return response()->json(compact('status'), 200);
        }
    }

    public function updateAuthor($id, Request $request)
    {
        $data = $request->all();

        try {
            $author = Authors::findOrFail($id);
            $author->name = $data['name'];
            $author->description = $data['description'];
            $author->url = $data['url'];

            // Buat save ke database
            $author->save();
            $status = 'success';
            return response()->json(compact('status', 'author'), 200);
        } catch (\Throwable $th) {
            $status = 'error';
            return response()->json(compact('status'), 200);
        }
    }

    public function deleteAuthor($id)
    {
        $author = Authors::findOrFail($id);
        $author->delete();

        $status = "delete success";
        return response()->json(compact('status'), 200);
    }
}
