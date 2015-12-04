<?php
/**
 * Created by PhpStorm.
 * User: elhazzat
 * Date: 11/30/15
 * Time: 6:42 PM
 */

class GetGameStatus extends Table{


    public function __construct(Site $site)
    {
        parent::__construct($site, "SteampunkedGame");

    }


    public function getGame($userid)
{
    $sql = <<<SQL
SELECT * from $this->tableName
where playerOneId=?  OR playerTwoId=?
SQL;

    $pdo = $this->pdo();
    $statement = $pdo->prepare($sql);
    $statement->execute(array($userid));
    if ($statement->rowCount() === 0) {
        return null;
    } else {
        $result = array();  // Empty initial array
        foreach ($statement as $row) {
            $result[] = new Game($row);
        }
        foreach ($result as $g) {
            $game = $g->getTheGame();
        }
    }

    return $game;
}







}