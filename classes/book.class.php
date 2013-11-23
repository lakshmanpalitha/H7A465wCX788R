<?php

class book {

    private $maxImgwidth = 600;
    private $maxImgheight = 400;
    private $thumbWidth = 80;
    private $thumbheight = '';
    private $mediumWidth = 300;
    private $mediumHeight = '';
    private $filename;
    private $tmp_name;
    private $size = false;
    private $thumbpath = "uploads/book_cover/thumb";
    private $largeimgpath = "uploads/book_cover/original";
    private $midthumbpath = "uploads/book_cover/medium";
    private $issize = false;

    public function book() {
        $this->read = new read();
        $this->con = new DB();
        $this->er = new errormsg();
        $this->qu = new query();
        $this->en = new Encryption();
        $this->email = new email();
        $this->pr = new process();
    }

    function saveBook($bookInfo) {
        if (!$bookInfo) {
            return false;
        }
        if (!$qry = $this->qu->insertQuery($bookInfo, "book_store")) {//create insert qry for data to the 'book_store' table
            $this->er->createerror("Qry create failed", 1);
            return false;
        }


        if (!$this->con->execute($qry)) {//run the qry and insert data to 'user' table
            return false;
        }
        $qry = "SELECT book_id FROM book_store ORDER BY book_id DESC";
        $res = $this->con->queryUniqueValue($qry);
        $bookId = $res;
        if ($bookId) {
            $this->mainBookUpload($bookId, $bookInfo['book_name_or_publication']);
        }
//
//        //inform to the customer registration success by email
//        $massage = 'Dear ' . $userData['first_name'] . ",\r\n";
//        $massage.="Thank you for registration from .....Your registration is done.you will recive confirmation mail shortly...\r\n";
//        $massage.="Thank you,\r\n";
//        $massage.="Web team.\r\n";
//        $this->email->setEmail(null, "Registration Success", $massage);
//        $this->email->send();

        return true;
    }

    function mainBookUpload($bookId, $bookName) {

        /*         * * upload book * * */
        $bookname = $this->bookUpload($bookName);
        var_dump($bookname);
        if ($bookname) {
            $this->con->execute('UPDATE book_store SET zip_upload_path="' . $bookname . '" WHERE book_id="' . $bookId . '"');
            $bookUpload = true;
        }

        /*         * * cover image upload * * */

        if ($covername = $this->coverImageUpload()) {
            $this->con->execute('UPDATE book_store SET cover_image_path="' . $covername . '" WHERE book_id="' . $bookId . '"');
            $coverImage = true;
        }
        /*         * * end cover image upload * * */
    }

    function coverImageUpload() {

        if (!$_FILES["img"]["name"]) {
            return false;
        }


        $identify = rand(0, 100000);
        $this->filename = $identify . "_" . stripslashes($_FILES['img']['name']);
        $this->tmp_name = $_FILES['img']['tmp_name'];
        $this->size = filesize($_FILES['img']['tmp_name']);



        if (!$this->filename || !$this->tmp_name) {# make sure that the file is not empty to avoid error
            return false;
            exit;
        }


        $uploadedfile = $this->tmp_name;
        $file_name = $this->filename;


        #get the file extension
        $boss = explode(".", strtolower($file_name));
        $extension = strtolower(end($boss)); #make it lowercase with strtower


        $array = array('jpg', 'jpeg', 'png', 'gif'); # store all allowed file type in array

        if (!in_array($extension, $array)) {
            #see if file type is in array else stop execution
            $this->er->createerror("invalid file type", 1);
            return false;
            exit;
        }


        $size = $this->size;

        if ($size > 5000 * 1024) { # check file size in kilobits
            $this->er->createerror("image size is too big", 1);
            return false;
            exit;
        }

#image processing start
        if ($extension == "jpg" || $extension == "jpeg") {
            $src = imagecreatefromjpeg($uploadedfile);
        } else
        if ($extension == "png") {
            $src = imagecreatefrompng($uploadedfile);
        } else {
            $src = imagecreatefromgif($uploadedfile);
        }

        list($width, $height) = getimagesize($uploadedfile); # get the width and height of our image
        if ($this->issize) {
            if ($width != $this->maxImgwidth) {#set the maximum width of the large image
                $this->er->createerror("Image width must be " . $this->maxImgwidth . "px", 1);
                return false;
                exit();
            }
            if ($height != $this->maxImgheight) {#set the maximum width of the large image
                $this->er->createerror("Image height must be " . $this->maxImgheight . "px", 1);
                return false;
                exit();
            }
        }

        //set thumb image width 
        $thumb_width = $this->thumbWidth;
        //set thumb image height
        if ($this->thumbheight) {
            $thumb_height = $this->thumbheight;
        } else {
            $thumb_height = ($height / $width) * $thumb_width;
        }

        //set medium image width

        $medium_width = $this->mediumWidth;

        //set medium image height
        if ($this->mediumHeight) {
            $medium_height = $this->mediumHeight;
        } else {
            $medium_height = ($height / $width) * $medium_width;
        }



        $tmp_original_image = imagecreatetruecolor($width, $height);
        $tmp_thumb_image = imagecreatetruecolor($thumb_width, $thumb_height);
        $tmp_medium_image = imagecreatetruecolor($medium_width, $medium_height);


        imagecopyresampled($tmp_original_image, $src, 0, 0, 0, 0, $width, $height, $width, $height);
        imagecopyresampled($tmp_thumb_image, $src, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height);
        imagecopyresampled($tmp_medium_image, $src, 0, 0, 0, 0, $medium_width, $medium_height, $width, $height);

        if (!is_dir($this->largeimgpath)) {
            if (!mkdir($this->largeimgpath, 0, true)) {
                $this->er->createerror("Internal error", 1);
                return false;
                exit;
            }
        }
        if (!is_dir($this->thumbpath)) {
            if (!mkdir($this->thumbpath, 0, true)) {
                $this->er->createerror("Internal error", 1);
                return false;
                exit;
            }
        }
        if ($this->midthumbpath) {
            if (!is_dir($this->midthumbpath)) {
                if (!mkdir($this->midthumbpath, 0, true)) {
                    $this->er->createerror("Internal error", 1);
                    return false;
                    exit;
                }
            }
        }

        //upload images

        $upload_original_image = imagejpeg($tmp_original_image, $this->largeimgpath . "/" . $file_name, 100);
        $upload_thumb_image = imagejpeg($tmp_thumb_image, $this->thumbpath . "/thumb_" . $file_name, 100);
        $upload_medium_image = imagejpeg($tmp_medium_image, $this->midthumbpath . "/medium_" . $file_name, 100);



        imagedestroy($src);
        imagedestroy($tmp_original_image);
        imagedestroy($tmp_thumb_image);
        imagedestroy($tmp_medium_image);

        return $this->filename;
    }

    function bookUpload($bookName) {

        if ($_FILES["zip_file"]["name"]) {
            $filename = $_FILES["zip_file"]["name"];
            $source = $_FILES["zip_file"]["tmp_name"];
            $type = $_FILES["zip_file"]["type"];

            $name = explode(".", $filename);
            $accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
            $okay = false;
            foreach ($accepted_types as $mime_type) {
                if ($mime_type == $type) {
                    $okay = true;
                    break;
                }
            }
            if (!$okay) {
                return false;
            }

            $continue = strtolower($name[1]) == 'zip' ? true : false;
            if (!$continue) {
                $myMsg = "Please upload a valid .zip file.";
            }

            /* PHP current path */
            // $path = dirname(__FILE__) . '/';
            $path = "uploads/books/";
//            $filenoext = basename($filename, '.zip');
//            $filenoext = basename($filenoext, '.ZIP');

            $myFileName = str_replace(' ', '_', $bookName);
            $myDir = $path . $myFileName; // target directory
            $myFile = $path . $filename; // target zip file


            if (is_dir($myDir))
                recursive_dir($myDir);

            mkdir($myDir, 0777);

            /* here it is really happening */

            if (move_uploaded_file($source, $myFile)) {
                $zip = new ZipArchive();
                $x = $zip->open($myFile); // open the zip file to extract
                if ($x === true) {
                    $zip->extractTo($myDir); // place in the directory with same name
                    $zip->close();
                    unlink($myFile);
                }
                //$myMsg = "Your .zip file uploaded and unziped.";
                return $myFileName;
            } else {
                //$myMsg = "There was a problem with the upload.";
                return false;
            }
        } else {
            return false;
        }

        /*         * * end book upload * * */
    }

}

?>