<?php

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class ProjectMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = DB::table('users')->select(['id'])->get()->all();
        $projects = DB::table('projects')->select(['id'])->get()->all();
        foreach ($users as $user) {
            $title = 'Project of user ' . $user->id;
            DB::table('project_members')->insert([
                'id' => Uuid::uuid5(Uuid::NAMESPACE_DNS, $title),
                'user_id' => $user->id,
                'project_id' => $this->getProject($projects)->id,
                'status' => $this->getStatus(),
                'created_at' => $this->getCreatedAt(),
                'updated_at' => $this->getCreatedAt(),
            ]);
        }
    }

    private function getProject(array $projects): StdClass
    {
        $index = array_rand($projects);
        return $projects[$index];
    }

    private function getStatus()
    {
        $statuses = ['', 'Invoiced'];
        $index = array_rand($statuses);
        return $statuses[$index];
    }

    private function getCreatedAt()
    {
        return DateTime::createFromFormat('U', time())->format('Y-m-d H:i:s');
    }
}
