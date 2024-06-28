<?php


function logError($err){
    $fp = fopen("./errores.log","a");
    fwrite($fp, date("Y-m-d H:i") . " "); // Añadir la fecha y hora antes del mensaje de error
    fwrite($fp, $err);
    fwrite($fp, "\n");
    fclose($fp);
}

function openConn() {
    $dbname = "pintores";
    $host = "localhost";
    $user = "gaspi";
    $password = "1234";
    $resState = "";
    $dbh = null;

    try {
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
        $dbh = new PDO($dsn, $user, $password); 
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $resState .= "\nConexion exitosa";
    } catch (PDOException $e) {
        $resState .= "\n" . $e->getMessage();
        logError($resState); // Logea el error
    }

    if ($dbh) {
        return $dbh;
    } else {
        echo json_encode(['error' => 'Conexion a la Base de Datos fallida: ' . $resState]);
    }
}

function runFilterQuery($query, $params) {
    $dbConn = openConn();
    if ($dbConn) {
        try {
            $stmt = $dbConn->prepare($query);

            if($params['id']){
                $stmt->bindParam(':id', $params['id']);
            }
            if($params['nombre']){
                $stmt->bindParam(':nombre', $params['nombre']);
            }
            if($params['epoca']){
                $stmt->bindParam(':epoca', $params['epoca']);
            }
            if($params['estilo']){
                $stmt->bindParam(':estilo', $params['estilo']);
            }

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();

            return $stmt->fetchAll(); 
        } catch (PDOException $e) {
            logError("Error ejecutando consulta: " . $e->getMessage());
            echo json_encode(['error' => 'Error ejecutando consulta']);
        } finally {
            $dbConn = null;
        }
    } else {
        echo json_encode(['error' => 'Conexion a la Base de Datos fallida']);
    }
}

function readPintores($params) {

    $query = "SELECT * FROM pintores ";
    if($params['id'] || $params['nombre'] || $params['epoca'] || $params['estilo']){
        $query .= "WHERE ";
    }
    if($params['id']){
        $query .= "id LIKE CONCAT('%', :id, '%') AND ";
    }
    if($params['nombre']){
        $query .= "nombre LIKE CONCAT('%', :nombre, '%') AND ";
    }
    if($params['epoca']){
        $query .= "epoca LIKE CONCAT('%', :epoca, '%') AND ";
    }
    if($params['estilo']){
        $query .= "estilo LIKE CONCAT('%', :estilo, '%') AND";
    }
    if($params['id'] || $params['nombre'] || $params['epoca'] || $params['estilo']){
        $query = substr($query, 0, -4);
    }
    if($params['order']){
        $order = $params['order'];
        if($order == 'Estilo'){
            $query .= "ORDER BY estilo";
        }
        else{
            $query .= "ORDER BY $order";
        }
    }

    $rawData = runFilterQuery($query, $params);
    $res = [];

    if ($rawData) {
        foreach ($rawData as $row) {
            $resObj = new stdClass();
            $resObj->id = $row['id'];
            $resObj->nombre = $row['nombre'];
            $resObj->salario = $row['salario'];
            $resObj->epoca = $row['epoca'];
            $resObj->estilo = $row['estilo'];
            array_push($res, $resObj);
        }
    }

    echo json_encode($res);
}

function runQuery($query) {
    $dbConn = openConn();
    if ($dbConn) {
        try {
            $stmt = $dbConn->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            return $stmt->fetchAll(); 
        } catch (PDOException $e) {
            logError("Error ejecutando consulta: " . $e->getMessage());
            echo json_encode(['error' => 'Error ejecutando consulta']);
        } finally {
            $dbConn = null;
        }
    } else {
        echo json_encode(['error' => 'Conexion a la Base de Datos fallida']);
    }
}


function readEstilos() {
    $rawData = runQuery("SELECT * FROM estilos");
    $res = [];

    if ($rawData) {
        foreach ($rawData as $row) {
            $resObj = new stdClass();
            $resObj->idEstilo = $row['idEstilo'];
            $resObj->estilo = $row['estilo'];

            array_push($res, $resObj);
        }
    }

    $JSONData = json_encode($res);
    echo $JSONData;
}

?>
