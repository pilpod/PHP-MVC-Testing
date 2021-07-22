<?php var_dump($data) ?>
<?php include('layout/head.php') ?>
<?php include('layout/header.php') ?>

    <main class="container mt-4">
        <h4>Product List</h4>
        
        <div class="row gx-5">

            <?php foreach ($data as $movie) {
                echo "<div class='card' style='width: 18rem;'>
                    <img src='{$movie->getImg()}' class='card-img-top' alt='Poster'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$movie->getTitle()}</h5>
                        <p class='card-text'>{$movie->getDescription()}</p>
                        <a href='#' class='btn btn-primary mt-2'>Add to cart</a>
                    </div>
                </div>";
            } ?>
        </div>

    </main>

<?php include('layout/footer.php') ?>