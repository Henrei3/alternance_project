<?php
namespace App\PGVM\model\DataObject;

class Utilisateur
{

    public string $nom;
    public string $prenom;
    public string $password;
    public string $email;
    public string $user_group;

    /**
     * @param string $nom
     * @param string $prenom
     * @param string | null $password
     * @param string $email
     * @param string $user_group
     */
    public function __construct(string $nom, string $prenom, string $email, string $user_group)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->user_group = $user_group;
    }


    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param string $user_group
     */
    public function setUserGroup(string $user_group): void
    {
        $this->user_group = $user_group;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getUserGroup(): string
    {
        return $this->user_group;
    }

}
