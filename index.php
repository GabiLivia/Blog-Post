<?php 
include 'components/header.php';

$sql='SELECT * FROM blog_posts';
$result=mysqli_query($conn, $sql);
$card=mysqli_fetch_all($result,MYSQLI_ASSOC)


?>



<div class="container d-flex flex-column justify-content-center align-items-center">
    <div class="title">Stories</div>
    <div class="container content d-flex justify-content-start  collapse-1g overflow-hidden">
        <div class="container-fluid p-3  " style="max-width:450px;">
            <div class="card text-bg-dark ">
                <img src="img/salad.jpg" class="card-img img-fluid" alt="salad">
                
                <div class="card-img-overlay">
                <p class="card-text"><small>Last updated 3 mins ago</small></p>
                    <h5 class="card-title">Welcome to the Home of Organic Salads</h5>
                    <p class="card-text text-align-center">The lovers of green life will definetely enjoy this paradise of herbs and greenery.</p>
                    
                </div>
            </div>
        </div>
        <div class="container-fluid row px-3">
            <?php foreach ($card as $post) : ?>
            <div class="card col-3 text-dark p-2   " style="width:200px;height:200px;" >
                <img src="<?php echo $post['image']; ?>" class="card-img" alt="...">
                <div class="card-img-overlay d-flex flex-column justify-content-end" >
                <p class="card-text"><small>
                    <?php echo $post['date'] ?>
                </small></p>
                    <h5 class="card-title">
                        <?php echo $post['title']; ?>
                    </h5>
                    <p class="card-text">
                        <?php echo $post['body']; ?>
                    </p>
                    
                </div>
            </div>
            <?php endforeach; ?>


    </div>
</div>
    
<?php include 'components/footer.php'; ?>