## Local Setup Instructions

Follow these steps to run this application locally on your machine:

### 1. Clone the Repository
```bash
git clone <https://github.com/KristoferTooding1/idea_Project>
cd idea
```

### 2. Install Dependencies
```bash
composer install
npm install && npm run dev
```

### 3. Environment Configuration
Copy the example environment file and generate a fresh application key:
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Database Setup
Configure your local environment (MySQL/SQLite) in the `.env` file, then run migrations and seed default values:
```bash
php artisan migrate:fresh --seed
```

### 5. Running the Application
If you are using **Laravel Herd**, the application is automatically available at `http://idea.test`.  
Otherwise, launch the native development server:
```bash
php artisan serve
```

---

## Running Tests

The application features a 100% green test suite with 53 assertions. Run the tests via Pest:

```bash
./vendor/bin/pest
```

