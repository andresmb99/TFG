<?php

function obtenerConexion(){
    $password = '';
    $user = 'root';
    $dbName = 'tesla';

    $database = new PDO('mysql:host=localhost;dbname=' . $dbName, $user, $password);

    $database->query("SET NAMES utf8;");

    $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $database;
}

function comprobar_usuario($email, $pw){
    $bd = obtenerConexion();
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $bd->prepare($sql);
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_OBJ);

    var_dump($usuario);

    if($usuario && password_verify($pw, $usuario->pw)){
        return $usuario; //si la pw es válida, devuelve el objeto usuario
    }
    return false;
}

function cargar_categorias(){
    $bd = obtenerConexion();
    $res= $bd->prepare("SELECT categoria_id, nombre FROM categorias ORDER BY categoria_id");
    $res->execute();

    if(!$res){
        return FALSE;
    }
    return $res;
}


function cargar_categoria($categoria){
    $bd= obtenerConexion();
    $res = $bd->prepare("SELECT nombre, descripcion FROM categorias WHERE categoria_id = ?");
    $res->execute([$categoria]);

    if(!$res){
        return FALSE;
    }
    return $res;
}


function cargar_productos_categorias($categoria){
    $bd = obtenerConexion();
    $res = $bd->prepare("SELECT producto_id, nombre, descripcion, categoria_id, stock, imagen_url, precio FROM productos WHERE categoria_id = ?");
    $res->execute([$categoria]);

    if(!$res){
        return FALSE;
    }
    return $res->fetchAll(PDO::FETCH_OBJ); //devuelve resultado como array

}

function cargar_productos($productos){
    if(empty($productos)){
        return false;
    }

    $bd=obtenerConexion();
    $numParametros = implode(',' , array_fill(0,count($productos),'?'));
    $res= $bd->prepare("SELECT producto_id, nombre, descripcion, categoria_id, stock, imagen_url, precio FROM productos WHERE producto_id IN ($numParametros)");
    $res->execute($productos);
    $resultados = $res->fetchAll(PDO::FETCH_OBJ);

    if(empty($resultados)){
        return FALSE;
    }
    return $resultados;
}


function insertar_pedido($carrito, $numero_id){
    $bd = obtenerConexion();
    $bd->beginTransaction();

    //insertar pedido
    $sql= "INSERT INTO pedidos SET numero_id = ?, fecha = NOW(), enviado = FALSE";
    $res = $bd->prepare($sql);
    $res->execute([$numero_id]);

    //obtener últinmo pedido insertado
    $sql = "SELECT MAX(pedido_id) pedido_id FROM pedidos";
    $res = $bd->query($sql);
    $ped = 0;

    foreach($res as $row){
        $ped = $row->pedido_id;
    }

    //insertar productos en el pedido
    foreach($carrito as $producto_id =>$cantidad){
        $sql = "INSERT INTO pedidos_productos SET pedido_id = $ped, producto_id = $producto_id, cantidad = $cantidad";
        $res = $bd->query($sql);
        if(!$res){
            $bd->rollBack();
            return false;
        }

        //actualizar stock de productos
        $sql= "UPDATE productos SET stock = stock - $cantidad WHERE producto_id = $producto_id";
        $res = $bd->query($sql);

        if(!$res){
            $bd->rollBack();
            return FALSE;
        }
    }

    $bd->commit();
    return $ped;

}

?>