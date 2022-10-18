<?php 
include 'components/header.php';
include 'config/database.php';

//setez variabilele
$title=$body='';
$titleErr=$bodyErr="";

if(isset($_POST['title'])){
    if(empty($_POST['title'])){
        $titleErr="Please choose a title";
    }else{
        $title=filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }



    if( empty($_POST['body'])){
        $bodyErr='Please provide a small description';
    }else{
        $body=filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if(is_dir('img')){
        mkdir('img');
    }


if(empty($nameErr)&& empty($bodyErr)){
    $image=$_FILES['image']??null;
    $imagePath='';
    if($image &&$image['tmp_name']){
        $imagePath='img/'.rand(1,8000).'/'.$image['name'];
        mkdir(dirname($imagePath));
        move_uploaded_file($image['tmp_name'], $imagePath);

    }
    


    $sql="INSERT INTO blog_posts (title, body, image) VALUES ('$title', '$body', '$imagePath') ";
    if(mysqli_query($conn, $sql)){
        header('Location:index.php');
    }else{
        echo 'Error:'. mysqli_error($conn);
    }
}
}

?>



<div class="container d-flex flex-column justify-content-center align-items-center">
    <div class="title">Add a culinary story</div>
    
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data"
    class="container-fluid text-align-center w-50">
        <div class="input-group">
            <div class="form-floating ">
                <input type="text" name="title" class="form-control <?php echo $titleErr? 'is-invalid': null ?> "  id="floatingInputGroup2" placeholder="Title" >
                <label for="floatingInputGroup2">Title of Blog Post</label>
            </div>
                <div class="invalid-feedback">
                    <?php echo $titleErr; ?>
                </div>
        </div>

        <div class="input-group ">
            <div class="form-floating ">
                <textarea type="text" name="body" class="form-control <?php echo $bodyErr ? 'is-invalid':null ?>"  id="floatingInputGroup2" placeholder="Description" required ></textarea>
                <label for="floatingInputGroup2">Description</label>
            </div>
                <div class="invalid-feedback">
                    <?php echo $bodyErr; ?>
                </div>
        </div>
        <div class="input-group ">
            <div class="form-floating ">
                <input type="file" name="image" class="form-control"  id="floatingInputGroup2" />
                <label for="floatingInputGroup2">Image</label>
            </div>
                
        </div>
       <div class="input-group">
        <div class="form-floating ">
            <input type="submit" value="submit" name=submit class="btn btn-dark p-3">
        </div>
       </div>
    </form>
</div>

<?php include 'components/footer.php' ?>