<?php

namespace App\PGVM\controller;
/**
 * Interface permettant de normaliser certaines fonctionnalités de certains controller
 * Spécifiquement les controlleurs qui s'occupent de la gestion des diverses tables
 *
 * Pour une version améliorée du projet ça pourrait être possible d'ajouter des fonctions comme
 * update, delete, select.
 */
interface InterfaceController
{
     public static function addForm();
     public static function add();
}