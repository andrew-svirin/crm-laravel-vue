<?php

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class MailstonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = DB::table('projects')->select(['id', 'user_id'])->get()->all();
        foreach ($projects as $project) {
            for ($i = 1; $i < 4; $i++) {
                $title = 'Mailstone ' . $i . ' of project ' . $project->id;
                DB::table('mailstones')->insert([
                    'id' => Uuid::uuid5(Uuid::NAMESPACE_DNS, $title . '-' . $project->id),
                    'title' => $title,
                    'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                    'project_id' => $project->id,
                    'user_id' => $project->user_id,
                    'status' => $this->getStatus(),
                    'created_at' => $this->getCreatedAt()
                ]);
            }
        }
    }

    private function getStatus()
    {
        $statuses = ['', 'Active', 'Locked', 'Disabled', 'Proposed'];
        $index = array_rand($statuses);
        return $statuses[$index];
    }

    private function getCreatedAt()
    {
        return DateTime::createFromFormat('U', time())->format('Y-m-d H:i:s');
    }
}
