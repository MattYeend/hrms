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

## Language files
When creating a new language file for pages (e.g. a new `create.blade.php` or `index.blade.php`), copy the `_default.php` language file in the different folders and add to it.

## How everything is related
Users
- Department ID (to departments)
- Roles ID (to roles)
- Seniority ID (to seniorities)
- Job ID (to job)
- Holiday Entitlement ID (to holiday entitlements)
- Contact ID (to user contacts)
- Created By (to users)
- Updated By (to users)
- Deleted By (to users)

Roles
- Created By (to users)
- Updated By (to users)
- Deleted By (to users)

Achievements
- Created By (to users)
- Updated By (to users)
- Deleted By (to users)

Leave
- Leave Status ID (to leave status)
- Status Change By (to users)
- Leave Type ID (to leave types)
- Created By (to users)
- Updated By (to users)
- Deleted By (to users)

User Contacts
- Relation ID (to contact relations)

Departments
- Company ID (to companies)
- Department Lead ID (to users)
- Created By (to users)
- Updated By (to users)
- Deleted By (to users)

Companies
- Contract ID (to contracts)
- Company Contact ID (to company contacts)
- Address Book ID (to address books)
- Company Relationship Manager (to users)
- Created By (to users)
- Updated By (to users)
- Deleted By (to users)

Contracts
- Licence ID (to licences)

Address Books
- Address Contact ID (to address contacts)

Job
- Salary Range ID (to salary ranges)
- Created By (to users)
- Updated By (to users)
- Deleted By (to users)

Notes
- Note Types ID (to note types)
- Created By (to users)
- Updated By (to users)
- Deleted By (to users)

User Tiles
- User ID (to users)
- Tile ID (to tiles)

User Language
- User ID (to users)
- Language ID (to languages)

User Goals
- User ID (to users)
- Goals ID (to goals)

Interests
- Created By (to users)
- Updated By (to users)
- Deleted By (to users)

User Interests
- User ID (to users)
- Interests ID (to interests)

Learnings
- Mark ID (to marks)
- Category ID (to categories)
- Difficulty ID (to difficulties)
- Time ID (to times)
- Provider ID (to providers)
- Created By (to users)
- Updated By (to users)
- Deleted By (to users)

User Learning
- User ID (to users)
- Learning ID (to learnings)

Providers
- Provider Contact ID (to provider contacts)

User Notes
- User ID (to users)
- Notes ID (to notes)

User Achievements
- User ID (to users)
- Achievements ID (to achievements)

Blogs
- Blog Type ID (to blog types)
- Author (to users)
- Updated By (to users)
- Deleted By (to users)

Categories to Blogs
- Blog ID (to blogs)
- Category ID (to blog categories)

Blog Likes
- Blog ID (to blogs)
- User ID (to users)

Blog Comments
- Blog ID (to blogs)
- User ID (to users)
- Created By (to users)
- Updated By (to users)
- Deleted By (to users)

Logs 
- Logged In User ID (to users)
- Related To User ID (to users)

Meetings
- Location ID (to locations)
- Meeting Type ID (to meeting types)
- Created By (to users)
- Updated By (to users)
- Deleted By (to users)

Locations
- Created By (to users)
- Updated By (to users)
- Deleted By (to users)

User Meetings 
- User ID (to users)
- Meeting ID (to meetings)

Rotas
- User ID (to users)
- Department ID (to departments)
- Created By (to users)
- Updated By (to users)
- Deleted By (to users)