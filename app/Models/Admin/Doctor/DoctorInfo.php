<?php

namespace App\Models\Admin\Doctor;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Operation\Operation;
use App\Models\Admin\OurService\OurServiceDepartment;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class DoctorInfo extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $table = 'doctor_infos';

    public $translatedAttributes = [
        'full_name',
        'biography',
        'specification',
        'edu_bachelor',
        'edu_master',
        'edu_phd',
        'edu_asperanture',
        'edu_addition',
        'description',
    ];

    protected $fillable = [
        'image',
        'card_image',
    ];

    const IMAGE_PATH = 'admin/images/doctors/doctor-infos/';

    public static function isPhotoDirectoryExists(): bool
    {
        if (!File::exists(self::IMAGE_PATH))
        {
            File::makeDirectory(self::IMAGE_PATH, 0777, true);
        }
        return true;
    }

    public static function randomImageName()
    {
        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = uniqid() . mt_rand(1000000, 9999999) . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $string = str_shuffle($pin);

        return $string;
    }

    public static function imageUrl()
    {
        $url = url(self::IMAGE_PATH) . '/';

        return $url;
    }

    public function deleteImage(): bool
    {
        // http://localhost:8000/admin/images/doctors/doctor-infos/ == 56
        $expl = substr($this->image, strlen(self::imageUrl()));
        if (File::exists(self::IMAGE_PATH.$expl))
        {
            File::delete(self::IMAGE_PATH.$expl);
        }
        return true;
    }
    
    public function deleteCardImage(): bool
    {
        // http://localhost:8000/admin/images/doctors/doctor-infos/ == 56
        $expl = substr($this->card_image, strlen(self::imageUrl()));
        if (File::exists(self::IMAGE_PATH.$expl))
        {
            File::delete(self::IMAGE_PATH.$expl);
        }
        return true;
    }

    public function awards(): BelongsToMany
    {
        return $this->belongsToMany(AwardDoctor::class, 'doctor_award', 'doctor_info_id');
    }

    public function operations(): BelongsToMany
    {
        return $this->belongsToMany(Operation::class, 'doctor_operation', 'doctor_info_id');
    }

    public function departments(): BelongsToMany
    {
        return $this->belongsToMany(OurServiceDepartment::class, 'department_doctor', 'doctor_info_id');
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}
