<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class ApiAuthorController extends Controller
{
    public function index(Request $request)
    {
        $defaultLimit = 20;
        $page = $request->get('page', 1);
        $limit = $request->get('limit', $defaultLimit);
        if (empty($limit)) {
            $limit = $defaultLimit;
        }
        $authors = Author::offset(($page - 1) * $limit)->limit($limit)->get();
        $authorsNumber = Author::count('id');
        return response()->json([
            'authors' => $authors,
            'pages' => ceil($authorsNumber / $limit)
        ]);
    }

    public function store(StoreAuthorRequest $request)
    {
        $request['date'] = date("Y-m-d H:i:s");
        Author::create($request->all());
        return response()->json([
            'success' => true
        ]);
    }

    public function update($id, UpdateAuthorRequest $request)
    {
        Author::where('id', $id)->update($request->all());
        return response()->json([
            'success' => true
        ]);
    }

    public function destroy($id)
    {
        Author::destroy($id);
        return response()->json([
            'success' => true
        ]);
    }
}
