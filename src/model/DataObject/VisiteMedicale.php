<?php

namespace App\PGVM\model\DataObject;

use App\PGVM\model\Repository\VisiteMedicaleRepository;
/**
 * Cette classe facilite la manipulation de données dedans l'application.
 *
 */

class VisiteMedicale
{
    public $user_id;
    public $date;

    /**
     * @param $user_id
     * @param $date
     */
    public function __construct($visite_row)
    {
        $this->user_id = $visite_row['u_id'];
        $this->date = $visite_row['date'];
    }


    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }


}