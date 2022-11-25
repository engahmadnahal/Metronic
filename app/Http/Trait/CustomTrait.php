<?php

namespace App\Http\Trait;

use Illuminate\Support\Facades\Storage;

trait CustomTrait
{
// Show Name Emp For user Cases
    /**
     *
     * @param file $file
     * @return string $fileName
     */
    public function uploadFile($file): string
    {
        $fileName = time() . "." . $file->getClientOriginalExtension();
        $file->storePubliclyAs("upload/images", $fileName);
        return 'upload/images/' . $fileName;
    }


    public function response($msg, $res = 200)
    {
        return response()->json(
            [
                'title' => $res >= 200 && $res < 300 ? __('msg.success') : __('msg.error'),
                'message' => $msg
            ],
            $res
        );
    }
}
