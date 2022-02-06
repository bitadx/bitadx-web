<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\SubmitCourseRequest;
use App\Http\Requests\Course\UpdateCourseRequest;
use App\Models\Category;
use App\Models\Course;
use App\Models\Enquiry;
use App\Models\RelatedClass;
use App\Models\SliderImages;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with(['category'])->get();
        $activeCourses = Course::with(['category'])->where('status', '1')->get();
        $inActiveCourses = Course::with(['category'])->where('status', '0')->get();
        return view('backend.course.index', compact('courses', 'activeCourses', 'inActiveCourses'));
    }

    public function create()
    {
        $category = Category::where('status', '=', '1')->get();
        $course = Course::where('status', '=', '1')->get();
        return view('backend.course.create', compact('category', 'course'));
    }

    public function store(SubmitCourseRequest $request)
    {
        if (isset($request->product_image)) {
            $courseImage = $this->fileToUpload($request['product_image'], '/uploads/product/images');
        }

        if (!isset($request->slug)) {
            $title = $request->product_title;

            $slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(" ", "-", strtolower($title)));

            $uniqueSlug = $this->uniqueSlug($slug);

            $request->merge(['slug' => $uniqueSlug]);
        } else {
            $slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(" ", "-", strtolower($request->slug)));

            $uniqueSlug = $this->uniqueSlug($slug);

            $request->merge(['slug' => $uniqueSlug]);
        }

        $storeCourse = Course::create([
            'category_id' => $request->category_id,
            'course_title' => $request->product_title,
            'price' => $request->price,
            'course_image' => !!$request->product_image ? $courseImage : $request->product_image,
            // 'ratings' => $request->ratings,
            'is_special' => $request->is_special,
            'course_description' => $request->product_description,
            'course_details' => $request->product_details,
            'seo_title' => $request->seo_title,
            'summary' => $request->summary,
            'keywords' => $request->keywords,
            'slug' => $uniqueSlug,
            'extra_seo' => $request->extra_seo,
            'active_step' => 1,
            'status' => '1',
        ]);

        $id = $storeCourse->id;

        $relatedClasses = [];
        if (!!$request->related_classes && count($request->related_classes) > 0) {
            for ($i = 0; $i < count($request->related_classes); $i++) {
                $relatedClasses[$i] = ['course_id' => $id, 'related_course_id' => $request->related_classes[$i], 'type' => 'related'];
            }

        }
        count($relatedClasses) > 0 && RelatedClass::insert($relatedClasses);

        if (isset($request->slider_image) && count($request->slider_image) > 0) {
            $data = [];
            foreach ($request['slider_image'] as $image) {
                $sliderImage = $this->fileToUpload($image, '/uploads/product/slider_images');
                array_push($data, ['course_id' => $id, 'image' => $sliderImage, 'type' => 'product_slider']);
            }

            SliderImages::insert($data);
        }

        return !!$storeCourse ? redirect('admin/products')->with('success', 'Product Created Successfully') :
        redirect()->back()->with('error', "Can't be created");
    }

    public function edit($id)
    {
        $category = Category::where('status', '=', '1')->get();
        $courseById = $this->show($id);
        $course = Course::where('status', '=', '1')->get();
        $relatedClasses = [];
        if (count($courseById->relatedClasses)) {
            foreach ($courseById->relatedClasses as $rel) {
                $relatedClasses[] = $rel->related_course_id;
            }
        }

        return view('backend.course.edit', compact('category', 'courseById', 'id', 'course', 'relatedClasses'));
    }

    public function update(UpdateCourseRequest $request, $id)
    {
        $details = [
            'category_id' => $request->category_id,
            'course_title' => $request->product_title,
            'price' => $request->price,
            // 'ratings' => $request->ratings,
            'availability' => $request->availability,
            'course_description' => $request->product_description,
            'course_details' => $request->product_details,
            'seo_title' => $request->seo_title,
            'summary' => $request->summary,
            'keywords' => $request->keywords,
            'extra_seo' => $request->extra_seo,
            'is_special' => $request->is_special
        ];

        if (isset($request->product_image)) {
            $courseImage = $this->fileToUpload($request['product_image'], '/uploads/course/images');
            $details['course_image'] = $courseImage;
        }

        $relatedClasses = [];
        if (!!$request->related_classes && count($request->related_classes) > 0) {
            RelatedClass::where('course_id', $id)->delete();
            for ($i = 0; $i < count($request->related_classes); $i++) {
                $relatedClasses[$i] = ['course_id' => $id, 'related_course_id' => $request->related_classes[$i], 'type' => 'related'];
            }

        }
        count($relatedClasses) > 0 && RelatedClass::insert($relatedClasses);

        if (isset($request->slider_image) && count($request->slider_image) > 0) {
            SliderImages::where('course_id', $id)->delete();
            $data = [];
            foreach ($request['slider_image'] as $image) {
                $sliderImage = $this->fileToUpload($image, '/uploads/product/slider_images');
                array_push($data, ['course_id' => $id, 'image' => $sliderImage, 'type' => 'product_slider']);
            }
            SliderImages::insert($data);
        }

        if (!isset($request->slug)) {
            $title = Course::select('course_title')->where('id', $id)->first();

            $slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(" ", "-", strtolower($title->course_title)));

            $uniqueSlug = $this->updateUniqueSlug($slug, $id);

            $request->merge(['slug' => $uniqueSlug]);
        } else {
            $slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(" ", "-", strtolower($request->slug)));

            $uniqueSlug = $this->updateUniqueSlug($slug, $id);

            $request->merge(['slug' => $uniqueSlug]);
        }
        $details['slug'] = $uniqueSlug;
        $update = Course::where('id', $id)->update($details);
        return !!$update ? redirect('admin/products')->with('success', 'Product Updated Successfully') :
        redirect()->back()->with('error', "Can't be updated");
    }

    public function deleteImage($id)
    {
        $delete = SliderImages::destroy($id);

        return $delete == 1
        ? redirect()
            ->back()
            ->with('success', 'Image Deleted')
        : redirect()
            ->back()
            ->with('error', 'Image cant be deleted');
    }

    public function show($id)
    {
        $courseById = Course::find($id);
        return $courseById;
    }

    public function destroy($id)
    {
        $delete = Course::destroy($id);

        return $delete == 1
        ? redirect()
            ->back()
            ->with('success', 'Course Deleted')
        : redirect()
            ->back()
            ->with('error', 'Course cant be deleted');
    }

    public function deleteBulk(Request $request)
    {
        $delete = Course::destroy($request->deleteIds);

        return !!$delete ? response()->json(['success' => $delete . " records deleted Successfully"]) :
        response()->json(['success' => "No record deleted"]);
    }

    public function deleteBulkEnquiries(Request $request)
    {
        $delete = Enquiry::destroy($request->deleteIds);

        return !!$delete ? response()->json(['success' => $delete . " records deleted Successfully"]) :
        response()->json(['success' => "No record deleted"]);
    }

    public function uniqueSlug($slug)
    {
        $i = 1;
        $uniqueSlug = $slug;
        do {
            $exist = Course::where('slug', $uniqueSlug)->exists();

            if ($exist) {
                $uniqueSlug = $slug . "-" . $i;
            }
            $i++;
        } while ($exist == true);

        return $uniqueSlug;
    }

    public function updateUniqueSlug($slug, $id)
    {
        $i = 1;
        $uniqueSlug = $slug;
        do {
            $exist = Course::where('slug', $uniqueSlug)
                ->where('id', '!=', $id)
                ->exists();

            if ($exist) {
                $uniqueSlug = $slug . "-" . $i;
            }
            $i++;
        } while ($exist == true);

        return $uniqueSlug;
    }

    public function fileToUpload($file, $path)
    {
        $fileName = uniqid() . time() . '.' . str_replace(' ', '_', $file->getClientOriginalName());

        $file->move(public_path($path), $fileName);

        return $path . "/" . $fileName;
    }

    public function enquiry()
    {
        $enquiries = Enquiry::get();
        return view('backend.enquiry.index', compact('enquiries'));
    }
}
