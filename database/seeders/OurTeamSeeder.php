<?php

namespace Database\Seeders;

use App\Models\OurTeam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OurTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $our_teams = array(
            array('id' => '1','name' => 'G.M. Zesan','email' => 'gmzesan7767@gmail.com','phone' => '01921324091','designation' => 'Marketing Specialist','facebook' => 'https://www.facebook.com/','twitter' => 'https://x.com/home','linkedin' => 'https://www.linkedin.com/feed/','image' => 'our-teams/uUCNMYzzOVkCGaJAEjFyXYtUj8DsNRcwgQcatNWj.jpg','created_at' => '2024-12-11 10:27:28','updated_at' => '2024-12-11 10:27:28')
        );

        foreach ($our_teams as $team) {
            OurTeam::create($team);
        }
    }
}
