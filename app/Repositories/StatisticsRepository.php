<?php

namespace App\Repositories;

use App\Models\Brand;
use App\Models\ContactUs;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\ProductComment;
use App\Models\Project;

class StatisticsRepository
{
    public function getProjectsCount()
    {
        return Project::query()
            ->count();
    }

    public function getActivePostsCount()
    {
        return Post::query()
            ->where('status', '=', Post::ACTIVE)
            ->count();
    }

    public function getBrandsCount()
    {
        return Brand::query()
            ->count();
    }

    public function getContactsCount()
    {
        return ContactUs::query()
            ->count();
    }

    public function getPendingPostCommentsCount()
    {
        return PostComment::query()
            ->where('status', '=', PostComment::PENDING)
            ->count();
    }

    public function getPendingProductCommentsCount()
    {
        return ProductComment::query()
            ->where('status', '=', ProductComment::PENDING)
            ->count();
    }

    public function getInActivePostCommentsCount()
    {
        return PostComment::query()
            ->where('status', '=', PostComment::INACTIVE)
            ->count();
    }

    public function getInActiveProductCommentsCount()
    {
        return ProductComment::query()
            ->where('status', '=', ProductComment::INACTIVE)
            ->count();
    }

    public function getActivePostCommentsCount()
    {
        return PostComment::query()
            ->where('status', '=', PostComment::ACTIVE)
            ->count();
    }

    public function getActiveProductCommentsCount()
    {
        return ProductComment::query()
            ->where('status', '=', ProductComment::ACTIVE)
            ->count();
    }

    public function getPostCommentsCountWithAnswer()
    {
        return PostComment::query()
            ->where('answer', '!=', '')
            ->whereNotNull('answer')
            ->count();
    }

    public function getProductCommentsCountWithAnswer()
    {
        return ProductComment::query()
            ->where('answer', '!=', '')
            ->whereNotNull('answer')
            ->count();
    }

    public function getPostCommentsCountWithOutAnswer()
    {
        return PostComment::query()
            ->whereNull('answer')
            ->orWhere('answer', '=', '')
            ->count();
    }

    public function getProductCommentsCountWithOutAnswer()
    {
        return ProductComment::query()
            ->whereNull('answer')
            ->orWhere('answer', '=', '')
            ->count();
    }
}
