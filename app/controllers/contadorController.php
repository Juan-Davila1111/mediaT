<?php

namespace app\controllers;

use app\models\mainModel;

class ContadorController extends mainModel
{
    public function contadorVistas()
    {
        $ip = $_SERVER["REMOTE_ADDR"];

        // Verificar si la IP ya está en la base de datos
        $query = "SELECT * FROM contador WHERE ip = :ip";
        $stmt = $this->ejecutarConsultaIp($query, ['ip' => $ip]);

        if ($stmt->rowCount() > 0) {
            // La IP ya existe, actualizar el contador de visitas
            $query = "UPDATE contador SET visitas = visitas + 1 WHERE ip = :ip";
        } else {
            // La IP no existe, insertarla con una visita inicial
            $query = "INSERT INTO contador (ip, visitas) VALUES (:ip, 1)";
        }

        // Ejecutar la consulta de actualización o inserción
        $dato = $this->ejecutarConsultaIp($query, ['ip' => $ip]);
        return $dato;
    }



    public function obtenerContador()
    {
        // Consulta para obtener el número total de visitas
        $query = "SELECT SUM(id) AS total_visitas FROM contador";
        $stmt = $this->ejecutarConsultaIp($query);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        // Manejo de posibles valores nulos
        return $result['total_visitas'] ?? 0;
    }
}
