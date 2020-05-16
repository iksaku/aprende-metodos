<?php

use App\Method;
use App\Topic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Symfony\Component\Yaml\Yaml;

class TopicSeeder extends Seeder
{
    public function run()
    {
        Topic::truncate();

        $data = Yaml::parseFile(database_path('/seeds/data.yml'));

        foreach ($data['topics'] as $topicData) {
            $topic = Topic::create(['name' => $topicData['name']]);

            foreach ($topicData['methods'] as $methodData) {
                /** @var Method $method */
                $method = $topic->methods()->create([
                    'slug' => Str::slug($methodData['name']),
                    'name' => $methodData['name'],
                    'content' => $methodData['content']
                ]);

                $method->exercises()->createMany($methodData['exercises']);
            }
        }
    }
}
