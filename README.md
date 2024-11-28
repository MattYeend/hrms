## Setup

- Run `git clone https://github.com/MattYeend/hrms.git`
- Run `composer install`
- Copy `.env.example` and rename as `.env`
- Add database configuration, e.g. `DB_DATABASE` and `DB_USERNAME`
- Add mail configuration, e.g. `MAIL_MAILER` and `MAIL_HOST`
- Run `php artisan storage:link` to setup the storage directory
- Create two JSON files called `holidays.json` and `regions.json` and store them in `storage/app`
- Run `php artisan key:generate`
- Run `npm install && npm run dev`
- Run `php artisan migrate` and then `php artisan db:seed`
- Run `php artisan serve`

## Tech
- Laravel 11.2
- Vue 3.4
- PHP 8.2

## Misc
- Clear Application Cache
- `php artisan cache:clear`
- Clear View Cache
- `php artisan view:clear`
- Clear Route Cache 
- `php artisan route:clear`
- Clear Configuration Cache
- `php artisan config:clear`
- Setup Storage Directory
- `php artisan storage:link`
- Create new everything (model, migration, controller, policy, requests, seeder)
- `php artisan make:<modelName> -a`
- Add relevant views (if needed)
- Add relevant route(s) (if needed)
- Run migration (`php artisan migrate`)
- Run individual seeder (`php artisan db:seed --Class=<seederName>`)
- Add seeder to DatabaseSeeder file
- Commit

## How to contribute
- Log an issue
- Add as much information as possible
- Assign it to yourself
- Checkout branch, add issue number to start of branch (from `develop` branch, `git checkout -b number-short-description-branch`)
- Commit message should start with a hash (#) and the issue number then message of issue
- Push branch
- Create a pull request to fully describe the fix
- Any new text on screen, add to relevant file(s) within the lang/ folder

## Work Arounds
- A work around for TinyMCE 6.8.1 is to set `convert_unsafe_embeds` to true which can be found in `hrms\node_modules\tinymce\tinymce.js` on around line 7430 

## How everything is related
- Users
-- Department ID (to departments)
-- Roles ID (to roles)
-- Seniority ID (to seniorities)
-- Job ID (to job)
-- Holiday Entitlement ID (to holiday entitlements)
-- Contact ID (to user contacts)
-- Created By (to users)
-- Updated By (to users)
-- Deleted By (to users)

- Roles
-- Created By (to users)
-- Updated By (to users)
-- Deleted By (to users)

- Achievements
-- Created By (to users)
-- Updated By (to users)
-- Deleted By (to users)

- Leave
-- Leave Status ID (to leave status)
-- Status Change By (to users)
-- Leave Type ID (to leave types)
-- Created By (to users)
-- Updated By (to users)
-- Deleted By (to users)

- User Contacts
-- Relation ID (to contact relations)

- Departments
-- Company ID (to companies)
-- Department Lead ID (to users)
-- Created By (to users)
-- Updated By (to users)
-- Deleted By (to users)