<?php
// Función para cargar estudiantes
function obtenerEstudiantes() {
    // Código para cargar estudiantes
    return ['dni' => '19604826', 'nombre' => 'Estudiante 1'],
    ['dni' => '19485768', 'nombre' => 'Estudiante 2'],
    ['dni' => '29305927', 'nombre' => 'Estudiante 3'],
    ['dni' => '18492859', 'nombre' => 'Estudiante 4'],
    ['dni' => '59275923', 'nombre' => 'Estudiante 5'],
    ['dni' => '12385924', 'nombre' => 'Estudiante 6'],
    ['dni' => '12382349', 'nombre' => 'Estudiante 7'],
    ['dni' => '59184125', 'nombre' => 'Estudiante 8'],
    ['dni' => '58148124', 'nombre' => 'Estudiante 9'],
    ['dni' => '69283417', 'nombre' => 'Estudiante 10'],;
}

// Función para asignar notas y asistencias
function asignarNotasYAsistencias($estudiantes) {
    $totalClases = 50; // Número total de clases

    foreach ($estudiantes as $indice => $estudiante) {
        $nota1 = rand(1, 10); // Genera una nota entre 1 y 10
        $nota2 = rand(5, 10); // Genera una nota entre 5 y 10
        $asistencias = rand(20, 40); // Genera asistencias entre 20 y 40

        // Calcular porcentaje de asistencias
        $porcentajeAsistencias = ($asistencias / $totalClases) * 100;

        // Guardar las notas y el porcentaje de asistencias en el array
        $estudiantes[$indice]['nota1'] = $nota1;
        $estudiantes[$indice]['nota2'] = $nota2;
        $estudiantes[$indice]['asistencias'] = $asistencias;
        $estudiantes[$indice]['porcentajeAsistencias'] = $porcentajeAsistencias;
    }

    return $estudiantes;
}

// Función para evaluar las condiciones
function revisarEstudiantes($estudiantes) {
    foreach ($estudiantes as $estudiante) {
        $dni = $estudiante['dni'];
        $nota1 = $estudiante['nota1'];
        $nota2 = $estudiante['nota2'];
        $porcentajeAsistencias = $estudiante['porcentajeAsistencias'];

        // Evaluación de condiciones
        if ($nota1 >= 8 && $nota2 >= 8 && $porcentajeAsistencias >= 80) {
            echo "Estudiante regular: DNI {$dni}\n";
        } elseif ($nota1 >= 8 && $nota2 >= 8 && $porcentajeAsistencias < 80) {
            echo "Debe asistir a clases de apoyo: DNI {$dni}\n";
        } elseif (($nota1 < 8 || $nota2 < 8) && $porcentajeAsistencias >= 80) {
            echo "Debe recuperar un examen: DNI {$dni}\n";
        } else {
            echo "Estudiante libre: DNI {$dni}\n";
        }
    }
}

// Ejecución del código
$estudiantes = obtenerEstudiantes();
$estudiantesConNotas = asignarNotasYAsistencias($estudiantes);
revisarEstudiantes($estudiantesConNotas);

?>