<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Faq\StoreFaqRequest;
use App\Http\Requests\Admin\Faq\UpdateFaqRequest;
use App\Repositories\FaqRepository;
use Exception;

class FaqController extends Controller
{
    private $faqRepository;

    public function __construct(FaqRepository $faqRepository)
    {
        $this->faqRepository = $faqRepository;
    }

    public function index()
    {
        $faqs = $this->faqRepository->paginate();
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(StoreFaqRequest $request)
    {
        try {
            $this->faqRepository->store($request);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('faqs.create');
    }

    public function edit($id)
    {
        $faq = $this->faqRepository->findById($id);
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(UpdateFaqRequest $request, $id)
    {
        try {
            $this->faqRepository->update($request, $id);
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('faqs.edit', $id);
    }

    public function destroy($id)
    {
        try {
            $faq = $this->faqRepository->findById($id);
            $faq->delete();
            newFeedback();
        } catch (Exception $exception) {
            newFeedback('پیام', 'عملیات با شکست مواجه شد', 'error');
        }
        return redirect()->route('faqs.index');
    }
}
