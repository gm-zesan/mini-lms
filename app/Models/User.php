<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_no',
        'password',
        'image',
        'address',
        'details',
        'is_blocked',
        'is_certificate_enable',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'student_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments', 'student_id', 'course_id')->withPivot(
            'payment_method',
            'transaction_id',
            'total_amount',
            'is_certificate_enabled',
            'status'
        )->withTimestamps();
    }

    // public function coursesAsTeacher()
    // {
    //     return $this->belongsToMany(Course::class, 'course_teacher', 'teacher_id', 'course_id')
    //                 ->withPivot('is_main')
    //                 ->withTimestamps();
    // }



    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
