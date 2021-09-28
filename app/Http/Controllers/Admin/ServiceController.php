<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Service\StoreServiceRequest;
use App\Http\Requests\Admin\Service\UpdateServiceRequest;
use App\Repositories\ServiceRepository;
use App\Services\Media\MediaFileService;
use Exception;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    private $serviceRepository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function index()
    {
        $services = $this->serviceRepository->paginate();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(StoreServiceRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $service = $this->serviceRepository->store($request);
                $image_id = MediaFileService::publicUpload($request->file('image'),
                    'services', null)->id;
                $this->serviceRepository->addImage($image_id, $service->id);
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('services.create');
    }

    public function edit($id)
    {
        $service = $this->serviceRepository->findById($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(UpdateServiceRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $service = $this->serviceRepository->findById($id);

                if ($request->hasFile('image')) {
                    $this->serviceRepository->update($request, null, $id);
                    $image_id = MediaFileService::publicUpload($request->file('image'),
                        'services', null)->id;
                    $this->serviceRepository->addImage($image_id, $service->id);
                    if ($service->image) {
                        $service->image->delete();
                    }
                } else {
                    $this->serviceRepository->update($request, $service->image_id, $id);
                }
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('services.edit', $id);
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $service = $this->serviceRepository->findById($id);

                if ($service->image) {
                    $service->image->delete();
                }

                $service->delete();
            });
            DB::commit();
            newFeedback();
        } catch (Exception $exception) {
            DB::rollBack();
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('services.index');
    }
}
