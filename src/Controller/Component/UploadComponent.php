<?php
/**
 * Created by sam.
 * Date: 2017/03/18
 * Time: 午後 08:06
 */
namespace App\Controller\Component;
use Cake\Controller\Component;
use Cake\Filesystem\Folder;

class UploadComponent extends Component{

    /**
     * @param $imageType
     * @param $uploadedImagefile
     * @return bool
     */
    public function saveImage($name, $imageType, $uploadedImagefile)
    {

        $filename = $name . time() . $uploadedImagefile['name'];
        $filepath = WWW_ROOT . 'img' . DS . 'uploads' . DS . $imageType;
        $file = $filepath . DS . $filename;

        if (!is_dir($filepath)) {
            $dir = new Folder($filepath, true, 0755);
        }

        if (move_uploaded_file($uploadedImagefile['tmp_name'], $file)) {
            return $filename;
        } else {
            return null;
        }
    }
}