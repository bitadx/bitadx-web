<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Enquiry\StoreContact;
use App\Http\Requests\Enquiry\StoreEnquiry;
use App\Mail\AdminContactMail;
use App\Mail\AdminEnquiryMail;
use App\Mail\ContactMail;
use App\Mail\EnquiryMail;
use App\Models\Category;
use App\Models\Course;
use App\Models\Enquiry;

class CourseController extends Controller
{
    public function courseBySlug($slug)
    {
        $course = Course::firstWhere('slug', $slug);

        $categories = Category::where('status', '1')->get();

        return view('frontend.course.courseDetail', compact('course', 'categories'));
    }

    public function submitEnquiry(StoreEnquiry $request)
    {
        $data = $request->except('product_id');
        $product = Course::findorfail($request->product_id);
        $data['product'] = $product->course_title;
        $data['price'] = $product->price;
        $storeEnquiry = Enquiry::create($data);

        // send enquiry mail to user
        \Mail::to($request->email)
            ->send(new EnquiryMail($storeEnquiry));

        // send enquiry mail to admin
        \Mail::to(env('ADMIN_EMAIL'))
            ->send(new AdminEnquiryMail($storeEnquiry));

        return !!$storeEnquiry ?
        redirect()->back()->with('success', 'Enquiry Submitted') :
        redirect()->back()->with('error', "Enquiry can't be submitted");
    }

    public function submitContact(StoreContact $request)
    {
        // $storeEnquiry = Enquiry::create($request->all());
        $data = $request->all();
        // send enquiry mail to user
        \Mail::to($request->email)
            ->send(new ContactMail($data));

        \Mail::to(env('ADMIN_EMAIL'))
            ->send(new AdminContactMail($data));

        return redirect()->back()->with('success', 'Enquiry Submitted');

    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }
}
