<?php

namespace Model;

use Components\Model\Model;
use Throwable;

class UrlList extends Model
{
    /**
     * @param string $short
     * @param string $long
     */
    public function create(string $short, string $long)
    {
        $sql = "INSERT INTO url_list (`short`, `long`) VALUES (?,?)";
        
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$short, $long]);   
        } catch (Throwable $e) {
            // log error here
            die("Something went wrong, please try again later");
        }
    }

    /**
     * @param string $short
     * @return string
     */
    public function getLongByShort(string $short): string
    {
        $sql = "select `long` from url_list where `short`=?";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$short]);
            $result = $stmt->fetch();
        } catch (Throwable $e) {
            // log error here
            die("Something went wrong, please try again later");
        }
        
        return $result['long'];
    }
}