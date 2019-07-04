<?php

use Illuminate\Database\Seeder;
use App\UserType;

class RatingReviews extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        $rating = new willvincent\Rateable\Rating;
        $rating->rating = mt_rand(1, 5);
        $rating->user_id = mt_rand(2, 100);

        $user->ratings()->save($rating);
        
    }
}
