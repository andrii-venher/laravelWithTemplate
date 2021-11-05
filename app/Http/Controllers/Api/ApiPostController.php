<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiPostController extends Controller
{
    public function index(Request $request)
    {
        $defaultLimit = 20;
        $page = $request->get('page', 1);
        $limit = $request->get('limit', $defaultLimit);
        if (empty($limit)) {
            $limit = $defaultLimit;
        }
        $posts = Post::offset(($page - 1) * $limit)->limit($limit)->get();
        $postsNumber = Post::count('id');
        return response()->json([
            'posts' => $posts,
            'pages' => ceil($postsNumber / $limit)
        ]);
    }

    public function store(StorePostRequest $request)
    {
        $request['date'] = date("Y-m-d H:i:s");
        Post::create($request->all());
        return response()->json([
            'success' => true
        ]);
    }

    public function update($id, UpdatePostRequest $request)
    {
        Post::where('id', $id)->update($request->all());
        return response()->json([
            'success' => true
        ]);
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return response()->json([
            'success' => true
        ]);
    }
}
