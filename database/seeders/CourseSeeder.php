<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = array(
            array('id' => '1','title' => 'New Course','description' => '<ul>
                                          <li>50+ live classes</li>
                                          <li>200+ prerecorded videos</li>
                                          <li>Support sessions daily</li>
                                          <li>Mock interview session</li>
                                          <li>Adequate practice materials</li>
                                          <li>Lifetime access</li>
                                      </ul>','type' => 'recorded','price' => '6000.00','image' => 'courses/Oev2PfvsLbiTp5HGaJbD6O5Lky4q3lYsXhamPie5.jpg','starting_date' => '2024-12-07','end_date' => '2024-12-20','google_classroom_code' => NULL,'what_will_learn' => '<ul>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, ipsum?
                                                  </li>
                                                  <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, ipsum?
                                                  </li>
                                                  <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, ipsum?
                                                  </li>
                                                  <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, ipsum?
                                                  </li>
                                                  <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, ipsum?
                                                  </li>
          </ul>','prerequisites' => '<ul>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, ipsum?
                                                  </li>
                                                  <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, ipsum?
                                                  </li>
                                                  <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, ipsum?
                                                  </li>
                                                  <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, ipsum?
                                                  </li>
                                                  <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, ipsum?
                                                  </li>
          </ul>','time_schedule' => '<ul>
          <li><strong>Class Starts:</strong> October 15</li>
                                                  <li><strong>Class Time:</strong></li>
                                                  <li><strong>Monday:</strong> 9 PM - 10:30PM</li>
                                                  <li><strong>Wednesday:</strong> 9 PM - 10.30 PM</li>
          </ul>','total_seats' => '60','total_lessons' => '70','is_certificate_enabled' => '0','created_at' => '2024-11-28 08:44:39','updated_at' => '2024-11-28 08:44:39')
        );

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
