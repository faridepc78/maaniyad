<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\SettingRequest;
use App\Repositories\SettingRepository;
use Exception;

class SettingController extends Controller
{
    private $settingRepository;

    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function index()
    {
        $setting = $this->settingRepository->show();

        if ($setting['status'] == 'store') {
            $setting =
                [
                    'id' => 0,
                    'projects_count' => null,
                    'customers_count' => null,
                    'team_count' => null,
                    'experience_count' => null,
                    'instagram' => null,
                    'telegram' => null,
                    'whatsapp' => null,
                    'email' => null,
                    'address' => null,
                    'phone' => null,
                    'mobile' => null,
                    'about_page' => null,
                    'status' => 'store'
                ];
        }

        return view('admin.settings.index', compact('setting'));
    }

    public function do(SettingRequest $request)
    {
        try {
            $setting = $this->settingRepository->show();
            if ($setting['status'] == 'store') {
                $this->settingRepository->store($request);
            } else {
                $this->settingRepository->update($request, $setting['id']);
            }
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('settings.index');
    }
}
