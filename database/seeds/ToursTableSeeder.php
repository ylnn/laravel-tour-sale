<?php

use Illuminate\Database\Seeder;

class ToursTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tours')->delete();
        
        \DB::table('tours')->insert(array (
            0 => 
            array (
                'id' => 1,
                'status' => 1,
                'category_id' => 1,
                'name' => '3 Days Black Sea Tour',
                'slug' => '3-days-blacksea',
                'description' => 'Blacksea Tour Description Full',
                'summary' => 'Blacksea Tour Description Summary',
                'created_at' => '2018-04-27 18:42:38',
                'updated_at' => '2018-04-27 18:42:38',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'status' => 1,
                'category_id' => 1,
                'name' => 'Aut molestiae omnis.',
                'slug' => 'adipisci-fugiat-eius-mollitia-iusto-et-omnis',
                'description' => 'Laborum ab est culpa non. Et placeat omnis sapiente repudiandae rerum quo. Provident impedit quae saepe. Quaerat voluptatem delectus omnis quo pariatur cupiditate et.',
                'summary' => 'Hic omnis accusamus eveniet omnis. Quae rerum cupiditate nobis rerum sapiente nulla delectus.',
                'created_at' => '2018-04-30 10:14:46',
                'updated_at' => '2018-04-30 10:14:46',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'status' => 1,
                'category_id' => 1,
                'name' => 'Iure aut eaque eligendi.',
                'slug' => 'deserunt-autem-libero-a-sed-nobis-dolorum',
                'description' => 'Iste cumque velit nulla soluta neque eaque error libero. Aut exercitationem architecto dolores. Quaerat molestiae aut in beatae eligendi doloribus at. Quis qui consequatur minima id.',
                'summary' => 'Delectus et illum ut. Omnis cum recusandae beatae. Suscipit eos doloremque adipisci incidunt ex delectus suscipit.',
                'created_at' => '2018-04-30 10:14:46',
                'updated_at' => '2018-04-30 10:14:46',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'status' => 1,
                'category_id' => 3,
                'name' => 'Necessitatibus aut est.',
                'slug' => 'dolor-ut-voluptatem-ad-doloremque-quidem',
                'description' => 'Est quia architecto dolores. Nesciunt quaerat officiis est corrupti voluptatem molestias. Ut architecto saepe architecto voluptatibus fugit iste. Qui et reiciendis minima mollitia.',
                'summary' => 'Quis saepe delectus maxime optio. Maxime repudiandae officia enim consectetur. Enim hic facere natus voluptatem deleniti nisi temporibus. Aut eligendi quo dolorum.',
                'created_at' => '2018-04-30 10:14:46',
                'updated_at' => '2018-04-30 10:14:46',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'status' => 1,
                'category_id' => 2,
                'name' => 'Fuga facere officia.',
                'slug' => 'dolorum-qui-quibusdam-et-magni-sed-corporis-doloremque',
                'description' => 'Explicabo iure neque quo quisquam. Unde accusamus ab dolorum voluptas suscipit optio autem aliquam. Autem corporis non tempora molestias quia temporibus rerum dolorem. Doloribus vel nostrum officiis vero nesciunt. Veniam eaque ut placeat omnis in.',
                'summary' => 'Quia unde dolores rerum cum eligendi et dolor. Cupiditate iure nesciunt et hic et impedit aut.',
                'created_at' => '2018-04-30 10:14:46',
                'updated_at' => '2018-04-30 10:14:46',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'status' => 1,
                'category_id' => 3,
                'name' => 'Recusandae enim at sed.',
                'slug' => 'cupiditate-ea-est-eaque-hic-nihil',
                'description' => 'Omnis ea explicabo ipsum veritatis deserunt. Odit illo voluptas placeat a aliquid minima. Omnis sunt explicabo occaecati quas vero ut et.',
                'summary' => 'Reprehenderit et quidem vitae enim provident doloribus. Libero ex nihil vitae aliquid recusandae.',
                'created_at' => '2018-04-30 10:14:46',
                'updated_at' => '2018-04-30 10:14:46',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'status' => 2,
                'category_id' => NULL,
                'name' => NULL,
                'slug' => NULL,
                'description' => NULL,
                'summary' => NULL,
                'created_at' => '2018-04-30 14:32:14',
                'updated_at' => '2018-04-30 14:32:34',
                'deleted_at' => '2018-04-30 14:32:34',
            ),
        ));
        
        
    }
}