<?php

namespace App\Http\Controllers;

use App\Models\Post;
use app\Models\PostPhoto;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;
// use Symfony\Component\HttpFoundation\File\UploadedFile; 
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\JsonResponse;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('postPhotos')->get();
        return response()->json(
            [
                'success' => true,
                'data' => $posts
            ],
            200
        );
    }

    public function show($id)
    {
        $post = Post::with('postPhotos')->findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $post
        ], 200);
    }
    

        public function create(StorePostRequest $request): JsonResponse
        {
            $validatedData = $request->validated();
    if(auth()->user()) { 
        $user_id = auth()->user()->id ;    
      } 
      else{ 
        return response()->json([
            'message' => "please login  .",
        ], 201);
      }
            // Create the post
            $post = Post::create([
                'content' => $validatedData['content'],
                'user_id' => $user_id
                // Add any other fields that Post model may require
            ]);
    
            // Handle photos
            if ($request->has('photos')) {
                foreach ($validatedData['photos'] as $photoData) {
                    $imageName = $photoData['photo']->store(Post::storageFolder); // You can change the storage path as needed
                    $post->postPhotos()->create([
                        'photo' => $imageName,
                        'content' => $photoData['content'] ?? null,
                    ]);
                }
            }
    
            return response()->json([
                'message' => "Post Created Successfully.",
                'data' => $post->load('postPhotos'),
            ], 201);
        }
    
    
     
        public function update(Request $request, $post_id)
        {
    
            $post = Post::find($post_id);
            Gate::authorize('update', $post);
            $data = $request->all();
            if (request()->has('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $data["photo"] = $photo['photo']->store(Post::storageFolder);
                    $post->postPhotos()->create($data);
                }
            }
            $post->update($data);
            return response()->json([
                'message' => "Post Created Successfully.",
                'data' => $post->load('postPhotos'),
            ], 201);
        }
     

    

    
        


  

      
    
        
        
        
        

    public function delete($post_id)
    { 
        
        $post = Post::find($post_id);
        Gate::authorize('delete', $post);
        if ($post) {
            $post->postPhotos()->delete();
            $post->delete();

            return response()->json([
                'message' => "Post Deleted Successfully!"
            ], 200);
        } else {
            return response()->json([
                'message' => "Post Not Found"
            ], 404);
        }
    }
}
