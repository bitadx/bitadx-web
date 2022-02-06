<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\StoreReviewRequest;
use App\Http\Requests\Review\UpdateReviewRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wallet;

class UserController extends Controller
{

    public function index()
    {
        $users = User::with('wallet')->where('role','user')->get();
        return view('backend.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.review.create');
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

    public function storeWalletAmount(Request $request)
    {
        $store = Wallet::updateOrCreate(
            ['user_id' => $request->user_id],
            ['amount' => $request->amount]
        );

        return !!$store ? redirect('admin/users')->with('success','Wallet Updated'):
        redirect()->back()->with('error',"Wallet can't be Updated");
    }


    public function destroy($id)
    {
        $destroy = User::destroy($id);

        return $destroy == 1 ? redirect('admin/users')->with('success','User Deleted'):
        redirect()->back()->with('error',"User can't be deleted");
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
