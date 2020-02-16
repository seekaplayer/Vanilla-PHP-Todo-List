<div class="container">
    <h1>My Todo's</h1>
    
    <div class="row">
        <div class="col-md-6">
            <?php foreach ($todoResults as $results): ?>
                <div class="card <?=$results['completed'] ? 'border border-success' : 'border border-danger'; ?>" style="margin-bottom: 10px;">
                    <div class="card-body">
                        <p class="card-text"><?= $results['name']; ?></p>
                        <a href="<?= $_SERVER['REQUEST_URI']; ?>todos/index.php?id=<?=$results['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <form action="" method="POST" style="display: inline-block;">
                            <button type="submit" name="status" class="btn <?=$results['completed'] ? 'btn-danger' : 'btn-success'; ?> btn-sm" value="<?=$results['id']; ?>"><?=$results['completed'] ? 'Un-Complete' : 'Complete'; ?></button>
                            <button type="submit" name="delete" class="btn btn-danger btn-sm" value="<?=$results['id']; ?>">Delete</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="col">
            <form action="" method="POST">
                <div class="input-group mb-3">
                    <input type="text" name="todoItem" class="form-control" placeholder="Add a Todo Item" aria-label="Add a Todo Item" aria-describedby="button-addon2" autocomplete="off" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="submit" name="addTodo" id="button-addon2">Add Todo</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    



   
        