<?php

namespace App\Http\Controllers\Admin\Operation;

use App\Http\Controllers\Controller;
use App\Models\Admin\Doctor\DoctorInfo;
use App\Models\Admin\Operation\Operation;
use App\Models\Admin\Operation\OperationImage;
use App\Http\Requests\Admin\Operation\StoreOperationRequest;
use App\Http\Requests\Admin\Operation\UpdateOperationRequest;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Operation::with('images')->get();

        return view('admin.operations.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = DoctorInfo::all();

        return view('admin.operations.create', compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOperationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOperationRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('header_image'))
        {
            $files = $request->header_image;
            $destination = public_path('admin/images/operations/home-image/');
            Operation::isHeaderPhotoDirectoryExists();
            $image_name = time().'_'.$files->getClientOriginalName();
            $files->move($destination, $image_name);
            $url = "http://localhost:8000/admin/images/operations/home-image/".$image_name;
            $data['header_image'] = $url;
        }
        $operations = Operation::create($data);

        if($request->hasFile('detail_image'))
        {
            $files = $request->detail_image;
            $destination = public_path('admin/images/operations/details/');
            Operation::isDetailPhotoDirectoryExists();
        
            foreach ($files as $file) {
                $image_name = time().'_'.$file->getClientOriginalName();
                $file->move($destination, $image_name);
                $url = "http://localhost:8000/admin/images/operations/details/".$image_name;
                $operations->images()->create(array(
                    'detail_image' => $url,
                ));
            }
        }

        $doctors = $request->doctor_id;
        if ($doctors != '') {
            foreach ($doctors as $doctor) {
                $operations->doctors()->attach($doctor);
            }
        }

        return redirect()->route('admin.operations.index')->withSuccess("Ma'lumot qo'shildi");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Operation\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Operation::whereId($id)->first();
        $attended_doctors = $item->doctors()->get();
        $operation_images = $item->images()->get();

        return view('admin.operations.show', compact('item', 'attended_doctors', 'operation_images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Operation\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operation = Operation::whereId($id)->first();
        $doctors = DoctorInfo::all();
        $attended_doctors = $operation->doctors()->get();
        $operation_images = $operation->images()->get();

        return view('admin.operations.edit', compact('operation', 'doctors', 'attended_doctors', 'operation_images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOperationRequest  $request
     * @param  \App\Models\Admin\Operation\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOperationRequest $request, $id)
    {
        $model = Operation::findOrFail($id);
        $data = $request->all();

        if($request->file('header_image') != null)
        {
            $model->deleteHeaderImage();
            $destination = public_path('admin/images/operations/home-image/');
            $files = $request->file('header_image');
            $image_name = time().'_'.$files->getClientOriginalName();
            $files->move($destination, $image_name);            
            $url = "http://localhost:8000/admin/images/operations/home-image/".$image_name;
            $data['header_image'] = $url;
        }
        $model->update($data);

        if($request->hasFile('detail_image'))
        {
            $model->deleteDetailImage();
            $files = $request->file('detail_image');
            $destination = public_path('admin/images/operations/details/');
        
            foreach ($files as $file) {
                $image_name = time().'_'.$file->getClientOriginalName();
                $file->move($destination, $image_name);
                $url = "http://localhost:8000/admin/images/operations/details/".$image_name;
                $model->images()->updateOrCreate([
                    'operation_id'=>$model->id,
                    'detail_image' => $url,
                ]);
            }
        }
        
        $model->doctors()->sync($request->doctor_id);

        return redirect()->route('admin.operations.index')->withSuccess("Ma'lumot tahrirlandi!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Operation\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Operation::findOrFail($id);
        $model->deleteDetailImage();
        $model->deleteHeaderImage();
        $model->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }
}
