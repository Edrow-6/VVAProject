<?php

namespace App\Models;

use eftec\PdoOne;
use Exception;
use PDOStatement;

class User
{
    const TABLE = 'utilisateurs';
    const PK = 'id';

    public static $pdo = null;

    /** Créer une table, si elle existe, l'opération est ignorée et elle retourne "false" */
    public static function createTable($def, $extra = null)
    {
        if (!self::getPdo()->tableExist(self::TABLE)) {
            return self::getPdo()->createTable(self::TABLE, $def, self::PK, $extra);
        }
        return false; // La table existe déjà
    }

    /**
     * Si le champs est non null, retourne le champs self::$pdo
     * Si la fonction global database() existe, alors elle est utilisée
     * Si la variable global $pdo existe, alors elle est utilisée
     * Sinon, la fonction retourne null
     */
    protected static function getPdo()
    {
        if (self::$pdo !== null) {
            return self::$pdo;
        }
        if (function_exists('database')) {
            return database();
        }
        if (isset($GLOBALS['pdo'])) {
            return $GLOBALS['pdo'];
        }
        return null;
    }

    /** Définie le champs self::$pdo */
    public static function setPdo($pdo)
    {
        self::$pdo = $pdo;
    }

    /** Supprime le contenu de la table (les enregistrements) */
    public static function truncate()
    {
        return self::getPdo()->truncate(self::TABLE);
    }

    /** upprime la table (structure et valeurs) */
    public static function dropTable()
    {
        if (!self::getPdo()->tableExist(self::TABLE)) {
            return self::getPdo()->dropTable(self::TABLE);
        }
        return false; // La table n'existe pas
    }

    /** Insert un nouvel enregistrement */
    public static function insert($obj)
    {
        return self::getPdo()->insertObject(self::TABLE, $obj);
    }

    /** Met à jour un enregistrement */
    public static function update($obj)
    {
        return self::getPdo()
            ->from(self::TABLE)
            ->set($obj)
            ->where(self::PK, $obj[self::PK])
            ->update();
    }

    /** Supprime un enregistrement */
    public static function delete($pk)
    {
        return self::getPdo()
            ->from(self::TABLE)
            ->where(self::PK, $pk)
            ->delete();
    }

    /** Récupère un enregistrement avec la clé primaire */
    public static function get($pk)
    {
        return self::getPdo()
            ->select('*')
            ->from(self::TABLE)
            ->where(self::PK, $pk)
            ->first();
    }

    /** Retourne la liste des enregistrements */
    public static function select($where = null, $order = null, $limit = null)
    {
        return self::getPdo()
            ->select('*')
            ->from(self::TABLE)
            ->where($where)
            ->order($order)
            ->limit($limit)
            ->toList();
    }

    /** Retourne le nombre d'enregistrement */
    public static function count($where = null)
    {
        return (int) self::getPdo()
            ->count()
            ->from(self::TABLE)
            ->where($where)
            ->firstScalar();
    }
}
