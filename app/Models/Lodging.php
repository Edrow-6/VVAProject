<?php

namespace App\Models;


// Hébergement
use Exception;
use PDOStatement;

class Lodging
{
    const TABLE = 'hebergements';
    const PK = 'numero';

    public static mixed $pdo = null;

    /**
     * Créer une table, si elle existe, l'opération est ignorée et elle retourne "false"
     * @param $def
     * @param null $extra
     * @return bool
     * @throws Exception
     */
    public static function createTable($def, $extra = null): bool
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
     * @return mixed
     * @throws Exception
     */
    protected static function getPdo(): mixed
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

    /**
     * Définie le champs self::$pdo
     * @param $pdo
     */
    public static function setPdo($pdo)
    {
        self::$pdo = $pdo;
    }

    /**
     * Supprime le contenu de la table (les enregistrements)
     * @return bool|array
     * @throws Exception
     */
    public static function truncate(): bool|array
    {
        return self::getPdo()->truncate(self::TABLE);
    }

    /**
     * Supprime la table (structure et valeurs)
     * @return bool
     * @throws Exception
     */
    public static function dropTable(): bool
    {
        if (!self::getPdo()->tableExist(self::TABLE)) {
            return self::getPdo()->dropTable(self::TABLE);
        }
        return false; // La table n'existe pas
    }

    /**
     * Insert un nouvel enregistrement
     * @param $obj
     * @return bool|int
     * @throws Exception
     */
    public static function insert($obj): bool|int
    {
        return self::getPdo()->insertObject(self::TABLE, $obj);
    }

    /**
     * Met à jour un enregistrement
     * @param $pk
     * @param $obj
     * @return bool|int
     * @throws Exception
     */
    public static function update($pk, $obj): bool|int
    {
        return self::getPdo()
            ->from(self::TABLE)
            ->set($obj)
            ->where(self::PK.'=:id', ['id' => $pk])
            ->update();
    }

    /**
     * Supprime un enregistrement
     * @param $pk
     * @return bool|int
     * @throws Exception
     */
    public static function delete($pk): bool|int
    {
        return self::getPdo()
            ->from(self::TABLE)
            ->where(self::PK, $pk)
            ->delete();
    }

    /**
     * Récupère un enregistrement avec la clé primaire
     * @param $pk
     * @return mixed
     * @throws Exception
     */
    public static function get($pk): mixed
    {
        return self::getPdo()
            ->select('*')
            ->from(self::TABLE)
            ->where(self::PK, $pk)
            ->first();
    }

    /**
     * Retourne la liste des enregistrements
     * @param null $where
     * @param null $order
     * @param null $limit
     * @return mixed
     * @throws Exception
     */
    public static function select($where = null, $order = null, $limit = null): mixed
    {
        return self::getPdo()
            ->select('*')
            ->from(self::TABLE)
            ->where($where)
            ->order($order)
            ->limit($limit)
            ->toList();
    }

    /**
     * Retourne la liste des enregistrements de type hébergement
     * @param null $where
     * @param null $order
     * @param null $limit
     * @return bool|array|PDOStatement
     * @throws Exception
     */
    public static function selectType($where = null, $order = null, $limit = null): bool|array|PDOStatement
    {
        return self::getPdo()
            ->select('*')
            ->from('types_hebergements')
            ->where($where)
            ->order($order)
            ->limit($limit)
            ->toList();
    }

    /**
     * Retourne le nombre d'enregistrement
     * @param null $where
     * @return int
     * @throws Exception
     */
    public static function count($where = null): int
    {
        return (int) self::getPdo()
            ->count()
            ->from(self::TABLE)
            ->where($where)
            ->firstScalar();
    }
}
