<?php

class AllGamesRenderer
{
    private $pictureLink;
    private $picHolder = 'placeHolder.jpg';

    /**
     * @param mixed $pictureLink
     */
    public function setPictureLink($pictureLink)
    {
        $this->pictureLink = $pictureLink;
    }

    /**
     * @return mixed
     */
    public function getPictureLink()
    {
        return $this->pictureLink;
    }

    public function renderGames($games) {
        echo '<div class="card-group">';
        foreach ($games as $game) {
            if ($game['pic']) {
                $pic = $this->getPictureLink() . $game['pic'];
            } else {
                $pic = $this->getPictureLink() . $this->picHolder;
            }
            echo '
            <div class="card m-5" style="width: 18rem;">
                <img src="' . $pic . '" class="figure-img img-fluid" alt="...">
                <div class="card-body">
                    <h5 class="card-title">' . $game['name'] . '</h5>
                    <p class="card-text">' . $game['description'] . '</p>
                    <a href="#" class="btn btn-primary getGame" id="' . $game['id'] . '">' . $game['name'] . '</a>
                    <a href="#" class="btn btn-danger deleteGame" id="' . $game['id'] . '">delete</a>
                </div>
            </div>
        ';
        }
        echo '
            <div class="card m-5" style="width: 18rem;">
                <img src="' . $this->getPictureLink() . $this->picHolder . '" class="figure-img img-fluid" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Новая ролевая</h5>
                    <p class="card-text">Создать новую ролевую</p>
                    <a href="pages/createGame.php" class="btn btn-primary" id="addNew">Add</a>
                </div>
            </div>
        ';
        echo '</div>';
    }
}