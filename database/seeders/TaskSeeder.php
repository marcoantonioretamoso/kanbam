<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lista de descripciones de ejemplo
        $descriptions = [
            'Limpieza de la unidad C2',
            'Revisión del sistema eléctrico',
            'Actualización del software de control',
            'Reparación del ascensor',
            'Pintura del pasillo principal',
            'Inspección de cámaras de seguridad',
            'Cambio de luces en el sótano',
            'Limpieza profunda de garaje',
            'Mantenimiento del generador',
            'Revisión del sistema contra incendios',
            'Reparación de cerradura en la puerta principal',
            'Reemplazo de sensores de movimiento'
        ];

        // Prioridades disponibles
        $prioridades = [
            Task::BAJA,
            Task::MEDIA,
            Task::ALTA
        ];

        // Creamos las tareas
        foreach ($descriptions as $index => $desc) {
            if (!Task::where('description', $desc)->exists()) {
                Task::create([
                    'description' => $desc,
                    'priority' => $prioridades[array_rand($prioridades)],
                    'type_id' => rand(1, 3),       // 1: HISTORIA, 2: BUG, 3: TAREA
                    'category_id' => rand(1, 4),   // 1: POR HACER, ..., 4: LISTO
                    'user_id' => rand(1, 2) // Cambia si tienes varios usuarios
                ]);
            }
        }
    }
}
