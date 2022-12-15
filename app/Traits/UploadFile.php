<?php

namespace App\Traits;

trait UploadFile
{
    public static function bootUploadFile()
	{
		static::saving(function ($model) {
            if(request('file'))
                $model->addMedia(request('file'))->toMediaCollection();
        });
    }

}
