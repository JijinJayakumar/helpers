<?php
/**
 * File helpers
 */

 if (!function_exists('folderCheck')) {
    /**
     * folderCheck
     * check a folder exists or not, if not exists create new folder with index file
     * @param  string $params
     *
     * @return void
     */
    function folderCheck(string $params = null)
    {
        if (!file_exists($params)) {
            mkdir($params, 0777, true);
            $myFile = $params . "/index.html"; // or .php
            $fh = fopen($myFile, 'w'); // or die("error");
            $stringData = "your dont have permission to view this folders";
            fwrite($fh, $stringData);
            fclose($fh);
        }
    }
}


if (!function_exists('fileRemove')) {
    /**
     * fileRemove
     * 
     * remove folder from directory
     *
     * @param  mixed $folderpath
     *
     * @return void
     */
    function fileRemove(string $folderpath)
    {
        if (file_exists($folderpath)) {
            unlink($folderpath);
            return true;
        } else {
            return false;
        }
    }
}





 if (!function_exists('fileUpload')) {

function fileUpload($key='',$file=''){
    // Count # of uploaded files in array
$total = count($_FILES[$key]['name']);
$fileData=[];

// Loop through each file
for( $i=0 ; $i < $total ; $i++ ) {

  //Get the temp file path
    $tmpFilePath = $_FILES[$key]['tmp_name'][$i];
    $fileName = $_FILES[$key]["name"][$i];
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $fileName = basename($fileName, $ext);
    $newFileName = $fileName . time() . "." . $ext;

  //Make sure we have a file path
  if ($tmpFilePath != ""){
    //Setup our new file path
    $newFilePath = $file."/".$newFileName;
    //Upload the file into the temp dir
    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
        $fileData[]=pathinfo($newFilePath);

    }
  }

}
return (count($fileData)<1)?$fileData:false;
 }

 }


 
if (!function_exists('JMakeThumbNail')) {
    /**
     * JMakeThumbNail
     *
     * @param  mixed $fileName
     * @param  int $fileHeight
     * @param  int $fileWidth
     * @param  mixed $raw_name
     *
     * @return void
     */
    function JMakeThumbNail(string $fileName = 'default.jpg', int $fileHeight = 100, int $fileWidth = 100, string $raw_name = 'default.jpg')
    {
        $temp_location = "./temp/";
        $source_file_name = (file_exists($fileName)) ? $fileName : 'default.jpg';
        $source_file_modified = (file_exists($source_file_name)) ? filemtime($source_file_name) : 0;
        $filename_array = explode('.', $source_file_name);
        $source_ext = strtolower(array_pop($filename_array));
        $mime_types = array(
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
        );
        $mime_type = false;
        if (array_key_exists($source_ext, $mime_types)) {
            $mime_type = $mime_types[$source_ext];
        }
        // Set a maximum height and width
        // round($fileWidth, -1); // Round to nearest ten
        $width = (isset($fileWidth) && $fileWidth < 1000) ? $fileWidth : 100;
        $height = (isset($fileHeight) && $fileWidth < 1000) ? $fileHeight : 100;
        // New dimensions
        list($width_orig, $height_orig) = getimagesize($source_file_name);
        $ratio_orig = $width_orig / $height_orig;
        if ($width / $height > $ratio_orig) {
            $width = intval($height * $ratio_orig);
        } else {
            $height = intval($width / $ratio_orig);
        }
        // New File Name
        $pattern = '/(.*)(\.[a-z]{3,4})$/';
        $replacement = $temp_location . "" . preg_replace('/\\.[^.\\s]{3,4}$/', '', $raw_name) . '_' . $width . 'x' . $height . '$2';
        $new_file_name = preg_replace($pattern, $replacement, $source_file_name);
        $new_file_modified = (file_exists($new_file_name)) ? filemtime($new_file_name) : 0;
        // Resample
        if (!file_exists($new_file_name) || $source_file_modified > $new_file_modified) {
            $image_p = imagecreatetruecolor($width, $height);
            switch ($mime_type) {
                case 'image/png':
                    $image = imagecreatefrompng($source_file_name);
                    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                    imagepng($image_p, $new_file_name, 8);
                    break;
                case 'image/gif':
                    $image = imagecreatefromgif($source_file_name);
                    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                    imagegif($image_p, $new_file_name, 80);
                    break;
                case 'image/jpeg':
                    $image = imagecreatefromjpeg($source_file_name);
                    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                    imagejpeg($image_p, $new_file_name, 80);
                    break;
            }
            imagedestroy($image_p);
        }
        return array(
            "mime" => $mime_type,
            "file" => $new_file_name,
        );
    }
}



