<?php

namespace App\Http\Traits;

use App\Models\TmpFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait FileUploadTrait
{


    /**
     * Move and rename a file from TmpFile model to a specific directory based on target model's id and title.
     *
     * @param \App\Models\TmpFile $fileModel
     * @param \Illuminate\Database\Eloquent\Model $targetModel
     * @param string $targetDir
     * @param string $attribute
     * @return string | bool
     */
    public function moveAndRenameFile(TmpFile $fileModel, Model $targetModel, string $targetDir, string $attribute): string|bool
    {
        $from_path = $fileModel->path . '/' . $fileModel->filename;

        if (Storage::exists($from_path)) {
            $extension = pathinfo($fileModel->filename, PATHINFO_EXTENSION);
            $new_filename = Str::slug($targetModel->title) . '.' . $extension;

            $to_path = $targetDir . '/' . $targetModel->id . '/' . $new_filename;

            if (Storage::move($from_path, $to_path)) {
                Storage::deleteDirectory($fileModel->path);
                $targetModel->{$attribute} = $to_path;
                $targetModel->save();

                return $to_path;
            }
        }

        return false;
    }

}
