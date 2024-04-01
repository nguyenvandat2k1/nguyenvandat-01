<?php

// CRUD -> Create/Read(Danh sách/Chi tiết)/Update/Delete
if (!function_exists('get_str_keys')) {
    function get_str_keys($data)
    {
        $keys = array_keys($data);

        $keysTenTen = array_map(function ($key) {
            return "`$key`";
        }, $keys);

        return implode(',', $keysTenTen);
    }
}

if (!function_exists('get_virtual_params')) {
    function get_virtual_params($data)
    {
        $keys = array_keys($data);

        $tmp = [];
        foreach ($keys as $key) {
            $tmp[] = ":$key";
        }

        return implode(',', $tmp);
    }
}

if (!function_exists('get_set_params')) {
    function get_set_params($data)
    {
        $keys = array_keys($data);

        $tmp = [];
        foreach ($keys as $key) {
            $tmp[] = "`$key` = :$key";
        }

        return implode(',', $tmp);
    }
}

if (!function_exists('insert')) {
    function insert($tableName, $data = [])
    {
        $strKeys = get_str_keys($data);
        $virtualParams = get_virtual_params($data);

        $sql = "INSERT INTO $tableName($strKeys) VALUES ($virtualParams)";

        $stmt = $GLOBALS['conn']->prepare($sql);

        foreach ($data as $fieldName => &$value) {
            $stmt->bindParam(":$fieldName", $value);
        }

        $stmt->execute();
    }
}

if (!function_exists('insert_get_last_id')) {
    function insert_get_last_id($tableName, $data = [])
    {
        $strKeys = get_str_keys($data);
        $virtualParams = get_virtual_params($data);

        $sql = "INSERT INTO $tableName($strKeys) VALUES ($virtualParams)";

        $stmt = $GLOBALS['conn']->prepare($sql);

        foreach ($data as $fieldName => &$value) {
            $stmt->bindParam(":$fieldName", $value);
        }

        $stmt->execute();

        return $GLOBALS['conn']->lastInsertId();
    }
}

if (!function_exists('listAll')) {
    function listAll($tableName)
    {
        $sql = "SELECT * FROM $tableName ORDER BY id DESC";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }
}

if (!function_exists('showOne')) {
    function showOne($tableName, $id)
    {
        $sql = "SELECT * FROM $tableName WHERE id = :id LIMIT 1";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":id", $id);

        $stmt->execute();

        return $stmt->fetch();
    }
}

if (!function_exists('update')) {
    function update($tableName, $id, $data = [])
    {
        $setParams = get_set_params($data);

        $sql = "UPDATE $tableName SET $setParams WHERE id = :id";

        $stmt = $GLOBALS['conn']->prepare($sql);

        foreach ($data as $fieldName => &$value) {
            $stmt->bindParam(":$fieldName", $value);
        }

        $stmt->bindParam(":id", $id);

        $stmt->execute();
    }
}

if (!function_exists('delete2')) {
    function delete2($tableName, $id)
    {
        $sql = "DELETE FROM $tableName WHERE id = :id";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":id", $id);

        $stmt->execute();
    }
}

if (!function_exists('checkUniqueName')) {
    // Nếu không trùng thì trả về True
    // Nếu trùng thì trả về False
    function checkUniqueName($tableName, $name)
    {
        $sql = "SELECT * FROM $tableName WHERE name = :name LIMIT 1";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":name", $name);

        $stmt->execute();

        $data = $stmt->fetch();

        return empty($data) ? true : false;
    }
}

if (!function_exists('checkUniqueNameForUpdate')) {
    // Nếu không trùng thì trả về True
    // Nếu trùng thì trả về False
    function checkUniqueNameForUpdate($tableName, $id, $name)
    {
        $sql = "SELECT * FROM $tableName WHERE name = :name AND id <> :id LIMIT 1";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":id", $id);

        $stmt->execute();

        $data = $stmt->fetch();

        return empty($data) ? true : false;
    }
}
