<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;  

class SchoolEmployee extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'school_fk_id',
        'firstname',
        'middle_name',
        'lastname',
        'gender',
        'phone',
        'email',
        'dob',
        'role_fk_id',
        'username',
        'password',
        'image',
        'last_active_at',
    ];

    // Relationship with roles
    public function role()
    {
        return $this->belongsTo(UserRole::class, 'role_fk_id');
    }

    public function school()
    {
        return $this->belongsTo(Customer::class, 'school_fk_id');
    }

    // Many-to-many relationship with permissions
    public function permissions()
    {
        return $this->belongsToMany(PermissionData::class, 'user_permissions', 'user_fk_id', 'permission_fk_id');
    }

    // Check if the user has a specific permission
    public function hasPermission($permission)
    {
        return $this->permissions->contains('name', $permission);
    }

    // A teacher can teach many subjects
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teacher_subject');
    }

    // A teacher can be assigned to many senior classes
    public function seniorClasses()
    {
        return $this->belongsToMany(LevelClass::class, 'class_teacher');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function assignedCourses()
    // {
    //     return $this->hasMany(TeacherClass::class, 'schoolEmployee_fk_id');
    // }

    public function teacherClasses()
    {
        return $this->hasMany(TeacherClass::class, 'schoolEmployee_fk_id');
    }


}
