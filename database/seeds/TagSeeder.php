<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
                'name' => 'Primo Tag'
            ],
            [
                'name' => 'Secondo Tag'
            ],
            [
                'name' => 'Terzo Tag'
            ],
            [
                'name' => 'Quarto tag'
            ],
            [
                'name' => 'Ennemiso Tag'
            ],
            [
                'name' => 'Basta tag'
            ],
        ];

        foreach ($tags as $tag) {
            $newTag = new Student();
            $newTag->name = $tag['name'];
            $newTag->save();
        }
    }
}
