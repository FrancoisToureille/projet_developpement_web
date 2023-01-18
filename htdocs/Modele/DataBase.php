<?php
class DataBase {
    
    //Temporary
    /**
     * Prepare and execute the S_query and return the result
     * @param $S_query
     * @return false|PDOO_statement|string
     */
    public function executeQuery($S_query)
    {
        try {
            $O_statement = $this->O_pdo->prepare($S_query);
            $O_statement->execute();
            $O_statement->setFetchMode(PDO::FETCH_OBJ);
            return $O_statement;
        }
        catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}