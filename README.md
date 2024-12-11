
1. Prerequisites
    PHP 8.x
    Composer
    Node.js and npm
    MySQL Database

2. Installation Steps
    1-Clone the repository:
        git clone https://github.com/SaeedSayedDev/E-commerce-Product-Management-Feature.git
        cd E-commerce-Product-Management-Feature

    2-Install dependencies:
        composer install
        npm install
        npm run build

    3-Set up environment variables:
        Copy .env.example to .env.
        Update database credentials and other environment variables.

    4-Run migrations:
        php artisan migrate


    5-Start the development server:
        php artisan serve

    6-Accessing the Application
        Open your browser and navigate to http://localhost:8000.
        Use the registration or login feature to access the product management interface.