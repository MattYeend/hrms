<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Mail\Events\MailSent;
use Illuminate\Support\Facades\Event;
use App\Listeners\LogSentEmail;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        $gitTag = trim(shell_exec('git describe --tags --abbrev=0'));
        View::share('gitTag', $gitTag);

        if (!app()->isLocal()) {
            $this->preventDestructiveCommands();
        }

        Event::listen(MessageSent::class, LogSentEmail::class);
    }

    /**
     * Registration of Policies.
     */
    protected $policies = [
        Achievements::class => AchievementsPolicy::class,
        AddressBook::class => AddressBookPolicy::class,
        AddressContact::class => AddressContactPolicy::class,
        BlogCategories::class => BlogCategoriesPolicy::class,
        BlogComments::class => BlogCommentsPolicy::class,
        BlogLikes::class => BlogLikesPolicy::class,
        Blogs::class => BlogsPolicy::class,
        BlogTypes::class => BlogTypesPolicy::class,
        Category::class => CategoryPolicy::class,
        CompanyContact::class => CompanyContactPolicy::class,
        Company::class => CompanyPolicy::class,
        ContactRelation::class => ContactRelationPolicy::class,
        Contract::class => ContractPolicy::class,
        Department::class => DepartmentPolicy::class,
        Difficulty::class => DifficultyPolicy::class,
        EmailLogs::class => EmailLogsPolicy::class,
        Goals::class => GoalsPolicy::class,
        HolidayEntitlement::class => HolidayEntitlementPolicy::class,
        Interests::class => InterestsPolicy::class,
        Job::class => JobPolicy::class,
        Languages::class => LanguagesPolicy::class,
        Learning::class => LearningPolicy::class,
        Leave::class => LeavePolicy::class,
        LeaveStatus::class => LeaveStatusPolicy::class,
        LeaveType::class => LeaveTypePolicy::class,
        Licence::class => LicencePolicy::class,
        Locations::class => LocationsPolicy::class,
        Logger::class => LoggerPolicy::class,
        Marks::class => MarksPolicy::class,
        Meetings::class => MeetingsPolicy::class,
        MeetingTypes::class => MeetingTypesPolicy::class,
        Notes::class => NotesPolicy::class,
        NoteTypes::class => NoteTypesPolicy::class,
        ProviderContact::class => ProviderContactPolicy::class,
        Provider::class => ProviderPolicy::class,
        Roles::class => RolesPolicy::class,
        Rotas::class => RotasPolicy::class,
        SalaryRange::class => SalaryRangePolicy::class,
        Seniority::class => SeniorityPolicy::class,
        Tiles::class => TilesPolicy::class,
        Time::class => TimePolicy::class,
        UserContact::class => UserContactPolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Prevent certain Artisan commands in non-local environments.
     */
    protected function preventDestructiveCommands()
    {
        $destructiveCommands = [
            'migrate:fresh',    // Drops all tables
            'migrate:reset',    // Rolls back all migrations
            'migrate:rollback', // Rolls back a batch of migrations
            'db:wipe',          // Drops all databases
        ];

        foreach($destructiveCommands as $command){
            Artisan::command($command, function() use ($command){
                $this->error("This '{$command}' command is disabled in this environment for safety");
            });
        }
    }
}
