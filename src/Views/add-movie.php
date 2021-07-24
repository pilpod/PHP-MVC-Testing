<?php include('layout/head.php') ?>
<?php include('layout/header.php') ?>

    <main class="container mt-4">
        <h4>Add Movie</h4>
        
        <div class="form-add-movie">
            <form action="?action=add-movie" method="post">
                <label for="img">Url de la imagen</label>
                <input type="text" name="img" id="img" class="form-control">
    
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control">
    
                <label for="description">Description</label>
                <textarea type="text" name="description" id="description" class="form-control"></textarea>

                <input type="submit" value="Add" class="btn btn-primary">
            </form>
        </div>

    </main>

<?php include('layout/footer.php') ?>