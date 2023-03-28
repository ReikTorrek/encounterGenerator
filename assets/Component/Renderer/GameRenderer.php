<?php

class GameRenderer
{
    public function renderGameCreator() {
        echo '<div>
    <form class="pt-5" action="../PHP/addGame.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Название</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <input type="text" class="form-control" id="description" name="description">
        </div>
        <div class="mb-3">
            <label for="picture" class="form-label">Выберите картинку</label>
            <input class="form-control" type="file" id="picture" name="pic">
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
        <div class="alert alert-danger visually-hidden" role="alert"></div>
    </form>
</div>';
    }
}