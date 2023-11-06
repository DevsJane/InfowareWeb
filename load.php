<?php
/*
* Script: Cargar datos de lado del servidor con PHP y MySQL
* Autor: Marco Robles
* Team: Códigos de Programación
*/


require 'config.php';

/* Un arreglo de las columnas a mostrar en la tabla */
$columns = ['id', 'email', 'username', 'password', 'nombre', 'apellido', 'sexo', 'fecha_nacimiento', 'pais', 'area_interes'];

/* Nombre de la tabla */
$table = "usuarios";

$id = 'id';

$campo = isset($_POST['campo']) ? $conn->real_escape_string($_POST['campo']) : null;


/* Filtrado */
$where = '';

if ($campo != null) {
    $where = "WHERE (";

    $cont = count($columns);
    for ($i = 0; $i < $cont; $i++) {
        $where .= $columns[$i] . " LIKE '%" . $campo . "%' OR ";
    }
    $where = substr_replace($where, "", -3);
    $where .= ")";
}

/* Limit */
$limit = isset($_POST['registros']) ? $conn->real_escape_string($_POST['registros']) : 10;
$pagina = isset($_POST['pagina']) ? $conn->real_escape_string($_POST['pagina']) : 0;

if (!$pagina) {
    $inicio = 0;
    $pagina = 1;
} else {
    $inicio = ($pagina - 1) * $limit;
}

$sLimit = "LIMIT $inicio , $limit";

/**
 * Ordenamiento
 */

 $sOrder = "";
 if(isset($_POST['orderCol'])){
    $orderCol = $_POST['orderCol'];
    $oderType = isset($_POST['orderType']) ? $_POST['orderType'] : 'asc';
    
    $sOrder = "ORDER BY ". $columns[intval($orderCol)] . ' ' . $oderType;
 }


/* Consulta */
$sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . "
FROM $table
$where
$sOrder
$sLimit";
$resultado = $conn->query($sql);
$num_rows = $resultado->num_rows;

/* Consulta para total de registro filtrados */
$sqlFiltro = "SELECT FOUND_ROWS()";
$resFiltro = $conn->query($sqlFiltro);
$row_filtro = $resFiltro->fetch_array();
$totalFiltro = $row_filtro[0];

/* Consulta para total de registro filtrados */
$sqlTotal = "SELECT count($id) FROM $table ";
$resTotal = $conn->query($sqlTotal);
$row_total = $resTotal->fetch_array();
$totalRegistros = $row_total[0];

/* Mostrado resultados */
$output = [];
$output['totalRegistros'] = $totalRegistros;
$output['totalFiltro'] = $totalFiltro;
$output['data'] = '';
$output['paginacion'] = '';

if ($num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $output['data'] .= '<tr>';
        $output['data'] .= '<td style="font-size:10px; width:20px;">' . $row['id'] . '</td>';
        $output['data'] .= '<td style="font-size:10px; width:20px;">' . $row['email'] . '</td>';
        $output['data'] .= '<td style="font-size:10px; width:20px;">' . $row['username'] . '</td>';
        $output['data'] .= '<td style="font-size:10px; width:20px;">' . $row['password'] . '</td>';
        $output['data'] .= '<td style="font-size:10px; width:20px;">' . $row['nombre'] . '</td>';
        $output['data'] .= '<td style="font-size:10px; width:20px;">' . $row['apellido'] . '</td>';
        $output['data'] .= '<td style="font-size:10px; width:20px;">' . $row['sexo'] . '</td>';
        $output['data'] .= '<td style="font-size:10px; width:20px;">' . $row['fecha_nacimiento'] . '</td>';
        $output['data'] .= '<td style="font-size:10px; width:20px;">' . $row['pais'] . '</td>';
        $output['data'] .= '<td style="font-size:10px; width:20px;">' . $row['area_interes'] . '</td>';
        $output['data'] .= '<td style="font-size:10px; width:20px;"><a class="btn btn-warning btn-sm" href="read.php?id=' . $row['username'] . '">Editar</a></td>';
        $output['data'] .= "<td><button class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#deleteModal" . $row['id'] . "'>Eliminar</button></td>";

        $output['data'] .= '</tr>';
    }
} else {
    $output['data'] .= '<tr>';
    $output['data'] .= '<td colspan="12">Sin resultados</td>';
    $output['data'] .= '</tr>';
}

if ($output['totalRegistros'] > 0) {
    $totalPaginas = ceil($output['totalRegistros'] / $limit);

    $output['paginacion'] .= '<nav>';
    $output['paginacion'] .= '<ul class="pagination">';

    $numeroInicio = 1;

    if(($pagina - 4) > 1){
        $numeroInicio = $pagina - 4;
    }

    $numeroFin = $numeroInicio + 9;

    if($numeroFin > $totalPaginas){
        $numeroFin = $totalPaginas;
    }

    for ($i = $numeroInicio; $i <= $numeroFin; $i++) {
        if ($pagina == $i) {
            $output['paginacion'] .= '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
        } else {
            $output['paginacion'] .= '<li class="page-item"><a class="page-link" href="#" onclick="nextPage(' . $i . ')">' . $i . '</a></li>';
        }
    }

    $output['paginacion'] .= '</ul>';
    $output['paginacion'] .= '</nav>';
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);

echo "
<div class='modal' tabindex='-1' id='deleteModal" . $row['id'] . "'>
<div class='modal-dialog'>
    <div class='modal-content'>
    <div class='modal-header'>
        <h5 class='modal-title'>Confirmación</h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
    </div>
    <div class='modal-body'>
        <p>¿Estás seguro de que quieres eliminar este elemento?</p>
    </div>
    <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
        <a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger'>Eliminar</a>
    </div>
    </div>
</div>
</div>
";

?>                        