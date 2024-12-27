# Easy Buy

## Overview
Easy Buy is a modern e-commerce platform designed to provide a seamless shopping experience for users. The project is built with a robust backend powered by Laravel 11 and a dynamic frontend developed using React 19. It supports essential e-commerce functionalities such as product listing, user authentication, shopping cart management, and order processing.

---

## Features
### Backend (Laravel 11):
- **User Management**: Registration, login, and authentication (JWT-based).
- **Product Management**: CRUD operations for products and categories.
- **Order Processing**: Order creation, status updates, and history tracking.
- **Database**: Efficient data storage using MySQL.
- **API**: RESTful API design for seamless frontend-backend communication.
- **Security**: Secure handling of user data with encryption and validation.

### Frontend (React 19):
- **Responsive Design**: Optimized for both desktop and mobile devices.
- **Product Display**: Interactive product listing and detail pages.
- **Shopping Cart**: Add, remove, and update items in the cart.
- **Checkout Flow**: Easy-to-use checkout process with validation.
- **State Management**: Managed using Redux Toolkit for consistent state updates.

---

## Tech Stack
- **Backend**: Laravel 11, PHP 8.2, MySQL
- **Frontend**: React 19, Redux Toolkit, Axios, Bootstrap/Tailwind CSS
- **API Communication**: RESTful API
- **Version Control**: Git & GitHub
- **Deployment**: Docker for containerization (optional)

---


## Setup Instructions

### **Notes:**
Run this command before commit file changes:
```bash
cp pre-commit .git/hooks/pre-commit  
```

### Prerequisites
- **Node.js** (v18 or later)
- **Composer** (v2 or later)
- **PHP** (v8.2 or later)
- **MySQL** (v8 or later)
- **Git**
- **Docker** (for Laravel Sail)

### Backend Setup
1. Clone the repository:
   ```bash
   git clone https://github.com/tqt97/easy-buy
   cd Backend
   ```
2. Copy the environment file and configure:
   ```bash
   cp .env.example .env
   ```
   Update the `.env` file with your database credentials.

3. Generate the application key:
   ```bash
   php artisan key:generate
   ```
    If using Docker, please scroll below to check next step
4. Run migrations and seed the database:
   ```bash
   php artisan migrate --seed
   ```

5. Start the development server:
   ```bash
   php artisan serve
   ```

### Using Laravel Sail
If you prefer to use Laravel Sail for a Docker-based setup:

1. Start the Sail environment:
   ```bash
   ./vendor/bin/sail up -d
   ```
   This command will start the application in a Docker container.

2. Run migrations and seed the database:
   ```bash
   ./vendor/bin/sail artisan migrate --seed
   ```

3. Access the application:
   ```
   http://localhost
   ```

### Frontend Setup
1. Navigate to the frontend directory:
   ```bash
   cd Frontend
   ```
2. Install dependencies:
   ```bash
   npm install
   ```
3. Start the development server:
   ```bash
   npm start
   ```

4. Open the app in your browser:
   ```
   http://localhost:3000
   ```

---

## API Documentation
API endpoints are documented using Postman/Swagger. Ensure the backend server is running to access them.

---

## Contributing
Contributions are welcome! Please follow these steps:
1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Commit your changes with clear messages.
4. Push the branch and create a pull request.

---

## License
This project is licensed under the MIT License. See the LICENSE file for details.

---

## Contact
For questions or collaboration, please contact:
- Email: [your-email@example.com]
- GitHub: [your-github-username]

---

Happy Coding! 🚀
