<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Repositories\AgencyRepository;
use Exception;

class AgencyController extends Controller
{
    private $agencyRepository;

    public function __construct(AgencyRepository $agencyRepository)
    {
        $this->agencyRepository = $agencyRepository;
    }

    public function index()
    {
        $agencies = $this->agencyRepository->paginate();
        return view('admin.agencies.index', compact('agencies'));
    }

    public function single($id)
    {
        $agency = $this->agencyRepository->findById($id);

        try {
            if ($agency['type'] == Agency::UNREAD) {
                $this->agencyRepository->updateType($agency['id']);
                $agency->refresh();
                return view('admin.agencies.single', compact('agency'));
            } else {
                return view('admin.agencies.single', compact('agency'));
            }
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
    }
}
