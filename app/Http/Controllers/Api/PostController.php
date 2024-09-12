<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    /**
     * @OA\Post(
     * path="/api/user/post/create",
     * summary="Create user post",
     * description="Create user post",
     * operationId="storePost",
     * tags={"User post"},
     * security={ {"sanctum": {} }},
     *@OA\RequestBody(
     *    @OA\MediaType(
     *        mediaType="multipart/form-data",
     *         encoding={
     *             "interests[]": {
     *                 "explode": true,
     *             },
     *         },
     *        @OA\Schema(
     *          @OA\Property(property="image",description="Post Images",type="array",
     *              @OA\Items(
     *                   type="string",
     *                   format="binary",
     *              ),
     *           ),
     *        @OA\Property(property="description", type="text", format="text", example="description"),
     *      )
     *    )
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Description field is required")
     *        )
     *     )
     * )
     */
    public function storePost(Request $request)
    {  

        $request->validate([
        'image'=>'required',
        'description'=>'required',
    ]);
        $post = new Post();
        $post->description = $request->description;
        $post->user_id = auth()->user()->id;
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            // Move the file to the public directory
            $path = $request->file('image')->move(public_path('description'), $filename);
            // Store the path relative to the public directory
            $post->image = 'description/' . $filename;
        }
        $post->save();
        return $this->sendResponse($post, 'Post is created');
    }


    /**
     * @OA\Get(
     * path="/api/user/post/index",
     * summary="User Post Index",
     * description="Post Data",
     * operationId="postIndex",
     * tags={"User post"},
     * security={{"sanctum": {} }},
     * @OA\Response(
     *    response=200,
     *    description="Success"
     *     ),
     * @OA\Response(
     *    response=401,
     *    description="Returns when List is not authenticated",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Not authorized"),
     *    )
     * )
     * )
     */
    public function postIndex(Request $request)
    {
        $data['posts'] = Post::paginate()->through(fn($p)=>new PostResource($p));
        return $this->sendResponse($data,'post listing');
    }



}