<?php

use App\Topic;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $topics = [
            [
                'name' => 'Interpolación',
                'methods' => [
                    'Interpolación Lineal',
                    'Newton hacia Adelante',
                    'Newton hacia Atrás',
                    'Newton con Diferencias Divididas',
                    'Lagrange',
                ],
            ],
            [
                'name' => 'Solución de Ecuaciones no Lineales',
                'methods' => [
                    'Gráfico',
                    'Bisectriz',
                    'Punto Fijo',
                    'Newton - Raphson',
                    'Falsa Posición',
                ],
            ],
            [
                'name' => 'Solución de Ecuaciones Lineales',
                'methods' => [
                    'Montante',
                    'Gauss - Jordan',
                    'Eliminación Gaussiana',
                    'Gauss - Seidel',
                    'Jacobi',
                    'Raíces de Polinomios',
                ],
            ],
            [
                'name' => 'Minimos Cuadrados',
                'methods' => [
                    'Línea Recta',
                    'Cuadrática',
                    'Cúbica',
                    'Lineal con Función',
                    'Cuadrática con Función',
                ],
            ],
            [
                'name' => 'Integración',
                'methods' => [
                    'Regla Trapezoidal',
                    'Newton - Cotes Cerradas',
                    'Newton - Cotes Abiertas',
                    'Tablas Constantes',
                    'Regla de 1/3 de Simpson',
                    'Regla de 3/8 de Simpson',
                ],
            ],
        ];

        $content = $faker->paragraphs(6, true);

        foreach ($topics as $topicData) {
            $topic = Topic::create([
                'name' => $topicData['name'],
            ]);

            $topic->methods()->createMany(
                collect($topicData['methods'])
                    ->map(function ($name) use ($content) {
                        $slug = Str::slug($name);

                        return compact('slug', 'name', 'content');
                    })
            );
        }
    }
}
