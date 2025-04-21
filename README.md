# For Laragon
Make sure to have the correct versions of the following:
- PHP 8.4.5
- Apache 2.4.63
Database may be disabled 

Install the following PHP extensions: (Menu/PHP/Extensions)
- pgsql
- pdo_pgsql

# For Laravel App
Make sure to have a '.env' file (Copy '.env.example' and rename it to '.env')

Generate an APK Key using the command below:
php artisan key:generate

# For Database
Create a Supabase Account, then send your Supabase email to get an invitation to the Supabase project

In .env, rename DB_URL to the URL below:
postgresql://postgres.cwwmwvlreqlljpvtcchc:OpItiA5SOEd7SgdP@aws-0-us-east-2.pooler.supabase.com:5432/postgres
