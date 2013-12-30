<?php

namespace Atomic\UserBundle\Model;

use Symfony\Component\HttpFoundation\File\UploadedFile;

abstract class ImageUpload {

    protected $file;
   
    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null) {
      
       
        $this->file = $file;
       
       
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile() {
        return $this->file;
    }

  

    public function getUploadRootDir() {
        
        return $_SERVER['DOCUMENT_ROOT'] . $this->getUploadDir();
    }

    abstract function getUploadDir();
    
    public function setUploadDir($uploadDir)
    {
        $this->uploadDir=$uploadDir;
    }
    
    public function upload()
    {
      
         $this->file->move($this->getUploadRootDir(),$this->file->getClientOriginalName());
         
         return $this->file->getClientOriginalName();
         
    }
    
 

   

}

?>
