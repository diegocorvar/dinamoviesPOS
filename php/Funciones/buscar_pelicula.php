<?php
require_once "../conexion/conexion.php";

$busqueda = $_GET['q'] ?? '';

$sql = "
SELECT 
    p.cve_pelicula,
    p.codigo_barras,
    p.titulo,
    p.precio_venta,
    p.valoracion_IMDb,
    c.clasificacion AS clasificacion,
    p.caratula,
    GROUP_CONCAT(g.genero SEPARATOR ',') AS generos
FROM peliculas p
LEFT JOIN clasificaciones c ON p.clasificacion = c.cve_clasificacion
LEFT JOIN pelicula_generos pg ON p.cve_pelicula = pg.cve_pelicula
LEFT JOIN generos g ON pg.cve_genero = g.cve_genero
WHERE p.titulo LIKE ? 
   OR p.codigo_barras LIKE ?
GROUP BY p.cve_pelicula
LIMIT 10";

$stmt = $conn->prepare($sql);

$param = "%$busqueda%";
$stmt->bind_param("ss", $param, $param);

$stmt->execute();

$result = $stmt->get_result();

$peliculas = [];

while ($row = $result->fetch_assoc()) {
    $peliculas[] = [
        "cve_pelicula" => $row["cve_pelicula"],
        "codigo_barras" => $row["codigo_barras"],
        "titulo" => $row["titulo"],
        "precio" => $row["precio_venta"],
        "imdb" => $row["valoracion_IMDb"],
        "clasificacion" => $row["clasificacion"],
        "generos" => $row["generos"] ?? "",
        "imagen" => $row["caratula"] 
            ? "/recursos/caratulas/" . $row["caratula"] 
            : "/recursos/caratulas/default.png"
    ];
}

header('Content-Type: application/json');
echo json_encode($peliculas);
