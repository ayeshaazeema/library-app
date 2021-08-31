<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function getBorrow($id)
    {
        return Borrow::findOrFail($id);
    }

    public function createBorrow(Request $request)
    {
        $data = $request->all();
        try {
            $borrow = new Borrow();
            $borrow->user_id = $data['user_id'];
            $borrow->book_id = $data['book_id'];
            $borrow->return = $data['return'];
            $borrow->deadline = $data['deadline'];
            $borrow->period = $data['period'];
            $borrow->save();
            $status = "success";
            return response()->json(compact('status', 'borrow'), 200);
        } catch (\Throwable $th) {
            $status = "failed";
            return response()->json(compact('status', 'th'), 401);
        }
    }


    public function updateBorrow($id, Request $request)
    {
        $data = $request->all();

        try {
            $borrow = Borrow::findOrFail($id);
            $borrow->user_id = $data['user_id'];
            $borrow->book_id = $data['book_id'];
            $borrow->return = $data['return'];
            $borrow->deadline = $data['deadline'];
            $borrow->period = $data['period'];
            $borrow->save();
            $status = "success";
            return response()->json(compact('status', 'borrow'), 200);
        } catch (\Throwable $th) {
            $status = "failed";
            return response()->json(compact('status', 'th'), 401);
        }
    }

    public function deleteBorrow($id)
    {
        $borrow = Borrow::findOrFail($id);
        $borrow->delete();
        $status = "deleted";
        return response()->json(compact('status'), 200);
    }
}
