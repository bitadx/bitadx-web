<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\StoreReviewRequest;
use App\Http\Requests\Review\UpdateReviewRequest;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Category;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::get();

        return view('backend.review.index',compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('status','1')->get();

        return view('backend.review.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReviewRequest $request)
    {
        if(isset($request->image_file)){
            $image = $this->fileToUpload($request['image_file']);

            $request->merge(['image' => $image]);
        }

        $store = Review::create($request->all());

        return !!$store ? redirect('admin/reviews')->with('success','Review Created'):
        redirect()->back()->with('success',"Review can't be Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('status','1')->get();

        $reviewById = Review::find($id);

        return view('backend.review.edit',compact('category','reviewById'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReviewRequest $request, $id)
    {
        if(isset($request->image_file)){
            $image = $this->fileToUpload($request['image_file']);

            $request->merge(['image' => $image]);
        }

        $store = Review::where('id',$id)->update($request->except('_token','_method','image_file'));

        return !!$store ? redirect('admin/reviews')->with('success','Review Updated'):
        redirect()->back()->with('error',"Review can't be Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Review::destroy($id);

        return $destroy == 1 ? redirect('admin/reviews')->with('success','Review Deleted'):
        redirect()->back()->with('error',"Review can't be deleted");
    }

    public function deleteBulk(Request $request){
        
        $delete = Review::destroy($request->deleteIds);

        return !!$delete ? response()->json(['success' => $delete." records deleted Successfully"]):
            response()->json(['success' => "No record deleted"]);
    }

    public function fileToUpload($file)
    {
        $fileName = uniqid().time().'.'.str_replace(' ', '_', $file->getClientOriginalName());  
          
        $file->move(public_path('uploads/reviews'), $fileName);
             
        return '/uploads/reviews/'.$fileName;
          
    }
}
