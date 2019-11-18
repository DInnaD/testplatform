<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(TagSeeder::class);
        $this->call(TestSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(AutoTestSeeder::class);
        $this->call(AnswerSeeder::class);
        $this->call(AutoQuestionSeeder::class);
        $this->call(AutoAnswerSeeder::class);
        $this->call(ResultSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(DymanicTextSeeder::class);
        $this->call(BanerSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(StaticTextSeeder::class);
        $this->call(ContactUsSeeder::class);
        $this->call(SubjectSeeder::class);
    }
}
