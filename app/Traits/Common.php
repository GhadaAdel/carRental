<?php

namespace App\Traits;

Trait common {

public function uploadFile($file, $path) {
    $extension= $file->getClientOriginalExtension();
    $fileName = time() . '.' . $extension;
    $path= 'assets\images';
    $file->move($path , $fileName);
    return $fileName;
    }
}

?>
