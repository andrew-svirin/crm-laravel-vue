<?php

use Illuminate\Database\Seeder;

class MailstonesTableSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      $projects = DB::table('projects')->select(['id'])->get()->all();
      foreach ($projects as $project)
      {
         for ($i = 1; $i < 4; $i++)
         {
            DB::table('mailstones')->insert([
               'title' => 'Mailstone of project ' . $project->id,
               'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
               'project_id' => $project->id,
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
