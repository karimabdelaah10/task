<?php

use App\Modules\BaseApp\Enums\S3Enums;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

if (!function_exists('activeListElement')) {
    function activeListElement($modulePrefix): string
    {
        $currentRoute = Route::currentRouteName();
        $currentRoute = explode('.', $currentRoute);
        $currentRoute = $currentRoute[0];
        if ($currentRoute == $modulePrefix) {
            return 'active';
        }
        return '';
    }
}
if (!function_exists('reFormatImage')) {
    function reFormatImage($pathFrom, $width, $height, $imageExt, $pathTo, $resizeType): void
    {
        if (Storage::exists($pathFrom)) {
            $image = Intervention\Image\Facades\Image::make(getImagePath($pathFrom));
            if ($resizeType == S3Enums::RESIZE) {
                $image->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                });
            } elseif ($resizeType == S3Enums::CROP) {
                $image->fit($width, $height);
            }

            $image->encode($imageExt, 60);
            Storage::put($pathTo, $image->__toString());
        }
    }
}
if (!function_exists('getImageUrl')) {
    function getImageUrl($imagePath, $alt = null)
    {
        try {
            if (Storage::get($imagePath)) {
                return Storage::url($imagePath);
            }

        } catch (Exception $exception) {
            if ($alt) {
                return $alt;
            }
            return url("/dashboard_assets/images/avatar.png");
        }
        return url("/dashboard_assets/images/avatar.png");
    }
}
if (!function_exists('getImagePath')) {
    function getImagePath($imagePath, $alt = null)
    {
        try {
            if (Storage::get($imagePath)) {
                return Storage::path($imagePath);
            }

        } catch (Exception $exception) {
            if ($alt) {
                return $alt;
            }
            return url("/dashboard_assets/images/avatar.png");
        }
        return url("/dashboard_assets/images/avatar.png");
    }
}
if (!function_exists('deleteImage')) {
    function deleteImage($imagePath): void
    {
        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }
    }
}

if (!function_exists('image')) {
    function image($img, $type, $folder = 'uploads')
    {
        $path = $folder;
        if ($type != "") {
            $path .= "/" . $type;
        }
        $path .= "/" . $img;
        return getImageUrl($path);
    }
}
if (!function_exists('viewFile')) {
    function viewFile($file, $folder = 'uploads', $placeholder = null)
    {
        $path = $folder . '/' . $file;
        $path = getImagePath($path, '');
        return '<i class="fa fa-paperclip"></i> <a href="' . $path . '" target="_blank" >' . $placeholder ?? $file . '</a>';
    }
}
if (!function_exists('viewInputImage')) {
    function viewInputImage($img, $type, $folder = 'uploads', $attributes = null)
    {
        $width = 300;
        if ($attributes) {
            $width = @$attributes['width'];
            $class = @$attributes['class'];
            $id = @$attributes['id'];
        }
        $src = image($img, $type, $folder);
        return '<img
                    style ="border-radius: 50% !important;
                            border: 1px solid #000;
                            width:' . $width . 'px !important ;
                            height:' . $width . 'px !important ;
                    "
                    src="' . $src . '"
                    class="' . @$class . '"
                    id="' . @$id . '" >';
    }
}

if (!function_exists('formatErrorValidation')) {
    /**
     *  JsonApi Error format Vlaidation
     * @param array $errors
     * @param int $code
     */
    function formatErrorValidation(array $errors, int $code = 422)
    {
        $errorsArray = [];
        foreach ($errors as $error) {
            if (is_array($error)) {
                $errorsArray[] = [
                    'status' => $error['status'],
                    'title' => snake_case($error['title']),
                    'detail' => $error['detail'],
                ];
            } else {
                $errorsArray[] = [
                    'status' => $errors['status'],
                    'title' => snake_case($errors['title']),
                    'detail' => $errors['detail'],
                ];
                break;
            }
        }
        return response()->json(["errors" => $errorsArray], $code);
    }
}
if (! function_exists('snake_case')) {
    /**
     * Convert a string to snake case.
     *
     * @param  string  $value
     * @param  string  $delimiter
     * @return string
     */
    function snake_case($value, $delimiter = '_')
    {
        return Str::snake($value, $delimiter);
    }
}
