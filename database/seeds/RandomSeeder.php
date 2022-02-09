<?php


use Phinx\Seed\AbstractSeed;

class RandomSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'datanumber' => $i,
                'datavarchar' => strval(10 - $i)
            ];
        }

        $this->table('random_data')->insert($data)->saveData();
    }
}
