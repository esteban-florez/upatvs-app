<?php

namespace App\Console\Commands;

use App\Models\Course;
use Illuminate\Console\Command;

class RemoveUnconfirmedEnrollments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'enrollments:unconfirmed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove unconfirmed enrollments from active Courses.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $courses = Course::all();

        $courses->reject(fn($course) => $course->phase === 'Inscripciones')
            ->each(function ($course) {
            $unconfirmed = $course->enrollments()
                ->whereNull('enrollments.confirmed_at')->get();
            
            $unconfirmed->each(fn($enrollment) =>$enrollment->delete());
        });

        echo "Removed unconfirmed enrollments successfully.\n";
        return 0;
    }
}
