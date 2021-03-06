<?php include('layout/head.php') ?>
<?php include('layout/header.php') ?>

    <main class="container mt-4">
        <h4>Product List</h4>
        
        <div class="row gx-5">

            <?php foreach ($data as $movie) {
                echo "<div class='card m-2' style='width: 18rem;'>
                    <img src='{$movie->getImg()}' class='card-img-top' alt='Poster'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$movie->getTitle()}</h5>
                        <p class='card-text crop-text-2'>{$movie->getDescription()}</p>
                        <a href='#' class='btn btn-primary mt-2'>Add to cart</a>
                        <a href='?action=delete-movie&id={$movie->getId()}' class='btn btn-danger mt-2'>x</a>
                    </div>
                </div>";
            } ?>
        </div>

    </main>

<?php include('layout/footer.php') ?>