<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repository\BlogRepository;
use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogController extends Controller
{
    protected $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::where('user_id', auth()->id())->paginate(10);
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'                     => 'required|string|max:255',
            'description'               => 'required|string|',
            'long_description'          => 'required|string',
            'photo'                     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $validatedData['user_id'] = auth()->user()->id;

        if ($request->hasFile('photo')) {
            $imagePath = $this->blogRepository->uploadFile($request->file('photo'), 'blog_images');
            $validatedData['photo'] = $imagePath;
        }
        $blog = $this->blogRepository->create($validatedData);

        return redirect()->route('blog-items.index')->with('success', 'Blog saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = $this->blogRepository->find($id);
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title'                     => 'required|string|max:255',
            'description'               => 'required|string|',
            'long_description'          => 'required|string',
            'photo'                     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $blog = $this->blogRepository->find($id);
        $this->blogRepository->update($id, $validatedData);

        // Handle image uploads
        if ($request->hasFile('photo')) {
            // Delete old images
            $this->blogRepository->deleteFile($blog->photo);

            // Upload new images
            $imagePath = $this->blogRepository->uploadFile($request->file('photo'), 'blog_images');
            $validatedData['photo'] = $imagePath;
        }

        return redirect()->route('blog-items.index')->with('success', 'Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog = $this->blogRepository->find($id);
        if($blog){
            $this->blogRepository->deleteFile($blog->photo);

            $this->blogRepository->delete($id);
            return redirect()->back()->with('success', 'Blog deleted successfully');
        }
        return redirect()->back()->with('error', 'Blog not found');
    }
}
