<div class="container">
    <h1>Edit Todo</h1>
    <div class="row">
    <div class="col">
            <form action="" method="POST">
                <input type="text" name="todoItem" class="form-control" value="<?= $todoResults['name']; ?>" aria-label="Add a Todo Item" aria-describedby="button-addon2" autocomplete="off" required>
                <div class="mt-2">
                    <button class="btn btn-outline-success" type="submit" name="editTodo" id="button-addon2">Edit Todo</button>
                    <a href="../" class="btn btn-outline-danger">Cancel Todo</a>
                </div>
            </form>
        </div>
    </div>
</div>