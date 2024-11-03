<?php

namespace Database\Factories;

use App\Models\Applicant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applicant>
 */
class ApplicantFactory extends Factory
{

    protected $model = Applicant::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'training_id' => Applicant::factory(),
            'full_name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'date_of_birth' => $this->faker->date,
            'gender' => $this->faker->randomElement(['male', 'female', 'other']),
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'country' => $this->faker->country,
            'postal_code' => $this->faker->postcode,
            'profile_picture_url' => $this->faker->imageUrl(),
            'national_id_number' => $this->faker->unique()->numerify('#########'),
            'passport_number' => $this->faker->unique()->bothify('????######'),
            'drivers_license_number' => $this->faker->unique()->bothify('????######'),
            'highest_degree' => $this->faker->randomElement(['Bachelor\'s', 'Master\'s', 'PhD']),
            'school_name' => $this->faker->company,
            'field_of_study' => $this->faker->word,
            'graduation_date' => $this->faker->date,
            'gpa' => $this->faker->randomFloat(2, 2, 4),
            'current_job_title' => $this->faker->jobTitle,
            'current_employer' => $this->faker->company,
            'years_of_experience' => $this->faker->numberBetween(0, 30),
            'skills' => $this->faker->words(5, true),
            'certifications' => $this->faker->words(3, true),
            'languages_spoken' => $this->faker->words(3, true),
            'application_date' => $this->faker->date,
            'application_status' => $this->faker->randomElement(['pending', 'accepted', 'rejected', 'paid']),
            'resume_url' => $this->faker->url,
            'cover_letter_url' => $this->faker->url,
            'portfolio_url' => $this->faker->url,
            'references' => $this->faker->paragraph,
            'referral_source' => $this->faker->word,
            'interview_date' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'linkedin_profile_url' => $this->faker->url,
            'github_profile_url' => $this->faker->url,
            'personal_website_url' => $this->faker->url,
            'social_media_links' => json_encode([
                'facebook' => $this->faker->url,
                'twitter' => $this->faker->url,
                'instagram' => $this->faker->url
            ]),
            'preferred_contact_method' => $this->faker->randomElement(['email', 'phone']),
            'preferred_job_location' => $this->faker->city,
            'willing_to_relocate' => $this->faker->boolean,
            'availability_start_date' => $this->faker->date,
            'expected_salary' => $this->faker->numberBetween(30000, 150000),
            'employment_type' => $this->faker->randomElement(['full-time', 'part-time', 'contract']),
            'work_authorization_status' => $this->faker->randomElement(['authorized', 'not authorized']),
            'notes' => $this->faker->paragraph,
            'tags' => $this->faker->words(3, true),
            'attachments' => json_encode([
                'certificate' => $this->faker->url,
                'transcript' => $this->faker->url
            ])
        ];
    }
}
