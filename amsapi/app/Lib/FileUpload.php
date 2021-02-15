<?php

namespace App\Lib;

use Illuminate\Support\Facades\File;

class FileUpload
{
    private $image_ext = ['jpg','jpeg' ,'png' ,'gif'];
    private $video_ext = ['mp4', 'mpeg', 'avi', 'mov', 'mpeg-4', 'wmv', 'mpeg-ps', 'flv', '3gpp', 'webm'];
    private $document_ext = ['doc', 'docx', 'pdf', 'pptx', 'ppt', 'xls', 'xlsx'];
    private $audio_ext = ['mp4'];
    private function getType($ext)
    {
        if (in_array($ext, $this->image_ext)) {
            return 'image';
        }

        if (in_array($ext, $this->audio_ext)) {
            return 'audio';
        }

        if (in_array($ext, $this->video_ext)) {
            return 'video';
        }

        if (in_array($ext, $this->document_ext)) {
            return 'document';
        }
    }
    public function upload($file, $prefix, $path)
    {
        // Retrieving file extension...
        $extension  = strtolower($file->getClientOriginalExtension());

        // Generating token value...
        $token = sha1(time().str_random(5));

        // Generating new file name...
        $file_name = $prefix."_".$token.".".$extension;

        // Uploading file...
        $file->move($path, $file_name);
        $type   = $this->getType($extension);
        // Return new file name...
        $data = array(
            'file_name' => $file_name,
            'type'      => $type,
            'status'    => true
        );

        return $data;
    }

    public function remove($file, $path)
    {
        // Getting file path...
        $delete_path = $path . $file;
        $deletable = public_path($delete_path);

        // Checking if file exists...
        $exists = File::exists($deletable);
        if($exists)
        {
            // Deleting file
            File::delete($deletable);

            return $data = array(
                'status' => true
            );
        }
        else
        {
            return $data = array(
                'status' => false
            );
        }
    }
}