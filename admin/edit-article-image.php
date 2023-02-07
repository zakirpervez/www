<?php
require '../includes/init.php';
if($_SERVER['REQUEST_METHOD']=="POST") {
    try {
        var_dump($_FILES);
        if(empty($_FILES)) {
            throw new Exception("Invalid upload");
        }
        switch($_FILES['file']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_INI_SIZE:
                throw new Exception('To large file only 2mb file would allow to upload');
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new Exception('No file found');
                break;

            default: throw new Exception('Something went wrong.');   
        }

        if($_FILES['file']['size'] > 1000000) {
            throw new  Exception("File size is too large");
        }

        $mime_types = ['image/gif', 'image/png', 'image/jpeg'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($finfo, $_FILES['file']['tmp_name']);
        if(! in_array($mime_type, $mime_types)) {
            throw new Exception('Invalid file type');
        }

//        $destination = '../uploads/'. $_FILES['file']['name'];
        $pathinfo = pathinfo($_FILES['file']['name']);
        $base = $pathinfo['filename'];
        $base = preg_replace('/[^a-zA-Z0-9_-]/', '_', $base);
        $filename = $base. '.'. $pathinfo['extension'];
        $destination = '../uploads/'.$filename;
        $i = 1;
        while (file_exists($destination)) {
            $filename = $base. '-'. $i. '.'. $pathinfo['extension'];
            $destination = '../uploads/'.$filename;
        }
        if (move_uploaded_file($_FILES['file']['tmp_name'], $destination)) {
            echo 'Image uploaded successfully';
        } else {
            throw new Exception("Something went wrong with upload");
        }
    } catch (Exception $e) {
        echo '<br> Error '. $e->getMessage();
    }
}

?>
<?php require '../includes/header.php'; ?>

<h2>Edit article image</h2>
<form method="post" enctype="multipart/form-data">
    <div>
        <label for="file">Browse</label>
        <input id="file" type="file" name="file" />
    </div>
    <div>
        <button>Upload</button>
    </div>
</form>
<?php require '../includes/footer.php'; ?>