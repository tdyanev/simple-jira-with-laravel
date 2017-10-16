<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Task::class, 50)->create()
            ->each(function ($task) {
                if (mt_rand(0, 3) == 1) {
                    $task->parent_task_id = App\Task::inRandomOrder()
                        ->where('id', '!=', $task->id)->first()->id;

                    $task->save();
                }
            });
    }
}
