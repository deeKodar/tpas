<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Dzongkhag;
use App\Models\SubjectType;
use App\Models\TransferGround;
use App\Models\TransferStage;
use App\Models\TransferType;
use App\Models\ContractType;
use App\Models\LeaveType;
use App\Models\TeacherStatusType;
use App\Models\ProjectionType;
use App\Models\SchoolLevel;
use App\Models\SchoolStatusType;
use Illuminate\Database\Eloquent\Model;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
        Commands\ImportMaster::class,
        Commands\RegisterAdmin::class
        
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
    }
}
