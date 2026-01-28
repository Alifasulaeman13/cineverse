<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Clear existing data
        DB::table('bookings')->delete();
        DB::table('reviews')->delete();
        DB::table('showtimes')->delete();
        DB::table('movies')->delete();
        DB::table('users')->delete();

        // Check if columns exist before inserting
        $userColumns = Schema::getColumnListing('users');

        $userData = [
            'username' => 'admin',
            'email' => 'admin@cineverse.com',
            'password' => Hash::make('admin123'),
            'is_admin' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Only add these columns if they exist in the table
        if (in_array('full_name', $userColumns)) {
            $userData['full_name'] = 'Administrator';
        }
        if (in_array('phone', $userColumns)) {
            $userData['phone'] = '08123456789';
        }

        DB::table('users')->insert([
            $userData,
            [
                'username' => 'testuser',
                'email' => 'user@test.com',
                'password' => Hash::make('user123'),
                'full_name' => in_array('full_name', $userColumns) ? 'Test User' : null,
                'phone' => in_array('phone', $userColumns) ? '08123456780' : null,
                'is_admin' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // ... (rest of the seeder code for movies, showtimes, reviews remains the same)
        // Insert movies
        DB::table('movies')->insert([
            [
                'title' => 'Now You See Me',
                'description' => 'An FBI agent and an Interpol detective track a team of illusionists who pull off bank heists during their performances and reward their audiences with the money.',
                'poster_url' => asset('images/posters/now-you-see-me-1.png'),
                'trailer_url' => 'https://www.youtube.com/embed/4I0u8EO30xQ',
                'duration' => 115,
                'rating' => 4.6,
                'release_date' => '2013-05-31',
                'genre' => 'Thriller',
                'status' => 'now_showing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Now You See Me 2',
                'description' => 'The Four Horsemen resurface and are forcibly recruited by a tech genius to pull off their most impossible heist yet in Macau.',
                'poster_url' => asset('images/posters/now_you_see_metwo.jpg'),
                'trailer_url' => 'https://www.youtube.com/embed/Eci8BaVPACE',
                'duration' => 129,
                'rating' => 4.3,
                'release_date' => '2016-06-10',
                'genre' => 'Thriller',
                'status' => 'now_showing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Spider-Man: No Way Home',
                'description' => 'With Spider-Man\'s identity now revealed, Peter asks Doctor Strange for help. When a spell goes wrong, dangerous foes from other worlds start to appear, forcing Peter to discover what it truly means to be Spider-Man.',
                'poster_url' => asset('images/posters/spide_man_NWH.jpg'),
                'trailer_url' => 'https://www.youtube.com/embed/JfVOs4VSpmA',
                'duration' => 148,
                'rating' => 4.9,
                'release_date' => '2021-12-17',
                'genre' => 'Action',
                'status' => 'now_showing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Avatar',
                'description' => 'A paraplegic Marine dispatched to the moon Pandora on a unique mission becomes torn between following his orders and protecting the world he feels is his home.',
                'poster_url' => asset('images/posters/avatar11.png'),
                'trailer_url' => 'https://www.youtube.com/embed/5PSNL1qE6VY',
                'duration' => 162,
                'rating' => 4.7,
                'release_date' => '2009-12-18',
                'genre' => 'Sci-Fi',
                'status' => 'now_showing',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // Insert showtimes
        DB::table('showtimes')->insert([
            [
                'movie_id' => 1,
                'show_date' => now()->addDays(1)->format('Y-m-d'),
                'show_time' => '13:00:00',
                'studio' => 'Studio 1',
                'price' => 50000.00,
                'available_seats' => 45,
                'total_seats' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movie_id' => 1,
                'show_date' => now()->addDays(1)->format('Y-m-d'),
                'show_time' => '16:00:00',
                'studio' => 'Studio 1',
                'price' => 50000.00,
                'available_seats' => 50,
                'total_seats' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movie_id' => 1,
                'show_date' => now()->addDays(1)->format('Y-m-d'),
                'show_time' => '19:00:00',
                'studio' => 'Studio 2',
                'price' => 60000.00,
                'available_seats' => 40,
                'total_seats' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movie_id' => 2,
                'show_date' => now()->addDays(1)->format('Y-m-d'),
                'show_time' => '14:00:00',
                'studio' => 'Studio 3',
                'price' => 55000.00,
                'available_seats' => 48,
                'total_seats' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movie_id' => 2,
                'show_date' => now()->addDays(1)->format('Y-m-d'),
                'show_time' => '20:00:00',
                'studio' => 'Studio 3',
                'price' => 65000.00,
                'available_seats' => 35,
                'total_seats' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // Insert sample reviews
        DB::table('reviews')->insert([
            [
                'movie_id' => 1,
                'user_id' => 2,
                'rating' => 5,
                'comment' => 'Film yang sangat bagus! Action-nya menegangkan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movie_id' => 1,
                'user_id' => 1,
                'rating' => 4,
                'comment' => 'Visual effect-nya keren, tapi plot agak predictable.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
