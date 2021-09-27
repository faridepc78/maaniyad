<?php

namespace App\Repositories;

use App\Models\ProjectGallery;

class ProjectGalleryRepository
{
    public function findGalleryByProjectId($project_id)
    {
        return ProjectGallery::query()
            ->where('project_id', '=', $project_id)
            ->latest()
            ->paginate(10);
    }

    public function store($values)
    {
        return ProjectGallery::query()
            ->create([
                'project_id' => $values['project_id'],
                'image_id' => null
            ]);
    }

    public function addImage($image_id, $id)
    {
        return ProjectGallery::query()
            ->where('id', '=', $id)
            ->update([
                'image_id' => $image_id
            ]);
    }

    public function findById($id)
    {
        return ProjectGallery::query()
            ->findOrFail($id);
    }
}
