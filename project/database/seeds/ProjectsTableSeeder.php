<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      $users = DB::table('users')->select(['id'])->get()->all();
      foreach ($users as $user)
      {
         DB::table('projects')->insert([
            'title' => 'Project of user ' . $user->id,
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'user_id' => $user->id,
            'status' => $this->getStatus(),
            'created_at' => $this->getCreatedAt()
         ]);
      }
   }

   private function getStatus()
   {
      $statuses = ['', 'On Development', 'On Estimate', 'On Hold'];
      $index = array_rand($statuses);
      return $statuses[$index];
   }

   private function getCreatedAt()
   {
      return DateTime::createFromFormat('U', time())->format('Y-m-d H:i:s');
   }
}
