<?php

use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('photos')->delete();
        
        \DB::table('photos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'filename' => 'tour_images/FinNu3uI0JhgqzkdZE2kkPqDlj0m1PYsxeddfgu6.jpeg',
                'filename_thumb' => 'tour_images/FinNu3uI0JhgqzkdZE2kkPqDlj0m1PYsxeddfgu6_thumb.jpeg',
                'created_at' => '2018-05-01 12:53:13',
                'updated_at' => '2018-05-01 12:53:13',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'filename' => 'tour_images/0d41YlyDbWRoHqBFuhaHUYYcFDMia3YtF0rDhdSn.jpeg',
                'filename_thumb' => 'tour_images/0d41YlyDbWRoHqBFuhaHUYYcFDMia3YtF0rDhdSn_thumb.jpeg',
                'created_at' => '2018-05-01 12:53:13',
                'updated_at' => '2018-05-01 12:53:13',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'filename' => 'tour_images/HdUZSclbvNetcGVr7GIpw4qRwTHFjvox4R7AYwSX.jpeg',
                'filename_thumb' => 'tour_images/HdUZSclbvNetcGVr7GIpw4qRwTHFjvox4R7AYwSX_thumb.jpeg',
                'created_at' => '2018-05-01 12:53:34',
                'updated_at' => '2018-05-01 12:53:34',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'filename' => 'tour_images/wApfq3wuFdExuBVciKMQ9jJn182WnwErE8F93DjZ.jpg',
                'filename_thumb' => 'tour_images/wApfq3wuFdExuBVciKMQ9jJn182WnwErE8F93DjZ_thumb.jpg',
                'created_at' => '2018-05-01 12:54:04',
                'updated_at' => '2018-05-01 12:54:04',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'filename' => 'tour_images/z9PvGWrPR2nzZfAEbpapdQL1jfQ7WC6PN2QZEBjx.jpeg',
                'filename_thumb' => 'tour_images/z9PvGWrPR2nzZfAEbpapdQL1jfQ7WC6PN2QZEBjx_thumb.jpeg',
                'created_at' => '2018-05-01 12:54:13',
                'updated_at' => '2018-05-01 12:54:13',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'filename' => 'tour_images/w9JjbCBeSLCiV0GgHJcBHLPRtU3wxMgSQ9be3XTj.jpeg',
                'filename_thumb' => 'tour_images/w9JjbCBeSLCiV0GgHJcBHLPRtU3wxMgSQ9be3XTj_thumb.jpeg',
                'created_at' => '2018-05-01 12:54:20',
                'updated_at' => '2018-05-01 12:54:20',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'filename' => 'tour_images/1iHfxeS4LxeWbT1SxujIDFg4wzEbGsTMaV4bbqkG.jpg',
                'filename_thumb' => 'tour_images/1iHfxeS4LxeWbT1SxujIDFg4wzEbGsTMaV4bbqkG_thumb.jpg',
                'created_at' => '2018-05-01 12:54:35',
                'updated_at' => '2018-05-01 12:54:35',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'filename' => 'tour_images/5OyDN0uZB2jYf1E1ii2eUFZvRd2XlGcBko0iRhUc.jpeg',
                'filename_thumb' => 'tour_images/5OyDN0uZB2jYf1E1ii2eUFZvRd2XlGcBko0iRhUc_thumb.jpeg',
                'created_at' => '2018-05-01 12:54:56',
                'updated_at' => '2018-05-01 12:54:56',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'filename' => 'tour_images/2SpGoqrAclRapMWGGWMd8qeoeoaeK311q1eLbu8l.jpeg',
                'filename_thumb' => 'tour_images/2SpGoqrAclRapMWGGWMd8qeoeoaeK311q1eLbu8l_thumb.jpeg',
                'created_at' => '2018-05-01 12:55:50',
                'updated_at' => '2018-05-01 12:55:50',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'filename' => 'tour_images/XOtBL2FqMHJeX7axTr1LJ4SMLCGKH0faTGOZ7wwi.jpeg',
                'filename_thumb' => 'tour_images/XOtBL2FqMHJeX7axTr1LJ4SMLCGKH0faTGOZ7wwi_thumb.jpeg',
                'created_at' => '2018-05-01 12:55:50',
                'updated_at' => '2018-05-01 12:55:50',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'filename' => 'tour_images/YyBEh7cV6UoD9hxNmHnZBQqYLXwhxK7ZK1nlGbDI.jpeg',
                'filename_thumb' => 'tour_images/YyBEh7cV6UoD9hxNmHnZBQqYLXwhxK7ZK1nlGbDI_thumb.jpeg',
                'created_at' => '2018-05-01 12:55:50',
                'updated_at' => '2018-05-01 12:55:50',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'filename' => 'tour_images/U9HbYYgHNlpEFdHeBRguePTKZd5itxLlPnz4Sb2E.jpeg',
                'filename_thumb' => 'tour_images/U9HbYYgHNlpEFdHeBRguePTKZd5itxLlPnz4Sb2E_thumb.jpeg',
                'created_at' => '2018-05-01 12:56:09',
                'updated_at' => '2018-05-01 12:56:09',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'filename' => 'tour_images/Tr6UugXS0JcNT8bIKZqLL164nkdftRjnYJB3OGY8.jpeg',
                'filename_thumb' => 'tour_images/Tr6UugXS0JcNT8bIKZqLL164nkdftRjnYJB3OGY8_thumb.jpeg',
                'created_at' => '2018-05-01 12:58:59',
                'updated_at' => '2018-05-01 12:58:59',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'filename' => 'tour_images/EXS2VhNrVmBR9Z4BAhqFlQ7Pbn8jnmMpNiMAPDs2.jpeg',
                'filename_thumb' => 'tour_images/EXS2VhNrVmBR9Z4BAhqFlQ7Pbn8jnmMpNiMAPDs2_thumb.jpeg',
                'created_at' => '2018-05-01 12:59:21',
                'updated_at' => '2018-05-01 12:59:21',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'filename' => 'tour_images/tpvDflt9YZB7QBRtogaXY3i976vDsr3ts5bNRioD.jpeg',
                'filename_thumb' => 'tour_images/tpvDflt9YZB7QBRtogaXY3i976vDsr3ts5bNRioD_thumb.jpeg',
                'created_at' => '2018-05-01 12:59:43',
                'updated_at' => '2018-05-01 12:59:43',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}