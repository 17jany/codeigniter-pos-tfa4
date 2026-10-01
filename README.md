# CodeIgniter POS TFA4

A CodeIgniter 4 Point-of-Sale application demonstrating customer and user account management, avatar upload, password hashing, login authentication, session management, protected routes, and logout functionality.

## Features

### Customer Management

- Customer records stored in a MySQL database
- New Customer form with required full-name validation
- Required and valid email-address validation
- Pre-filled customer edit form
- Customer record updates

### User Management

- User records stored in a MySQL database
- Required and unique username validation
- Required full-name validation
- Password and password-confirmation validation
- Password hashing using `password_hash()`
- Pre-filled user edit form
- User record updates

### Avatar Upload

- Optional user-avatar upload
- JPG and PNG file validation
- Maximum avatar size of 2 MB
- Uploaded images prepared as 300-by-300-pixel avatars
- Generated avatar filenames stored in the database
- Placeholder image for accounts without an uploaded avatar

### Authentication and Sessions

- Staff login form
- Password verification using `password_verify()`
- Login state stored using CodeIgniter sessions
- Authentication filter for protected pages
- Customer and User Account pages restricted to logged-in users
- Logout action that destroys the active session
- Logged-out users redirected to the login page

## Application Pages

| Page | Local URL | Description |
|---|---|---|
| Home | `http://localhost:8081/` | Displays the POS home page |
| About | `http://localhost:8081/index.php/about` | Describes the application |
| Login | `http://localhost:8081/index.php/login` | Authenticates a staff account |
| Customers | `http://localhost:8081/index.php/customers` | Displays protected customer accounts |
| New Customer | `http://localhost:8081/index.php/customers/new` | Creates a validated customer record |
| Users | `http://localhost:8081/index.php/users` | Displays protected user accounts and avatars |
| New User | `http://localhost:8081/index.php/users/new` | Creates a user with a hashed password |

## Requirements

- PHP 8.2 or later
- Composer
- MySQL or MariaDB
- PHP MySQLi extension
- PHP GD extension
- XAMPP or another compatible local server

## Installation

1. Clone or download this repository.

2. Open a terminal inside the project folder containing the `spark` file.

3. Install the dependencies:

```bash
composer install
```

4. Copy or rename the root `env` file to `.env`.

5. Configure `.env`:

```ini
CI_ENVIRONMENT = development

app.baseURL = 'http://localhost:8081/'

database.default.hostname = 127.0.0.1
database.default.database = pos_tfa4
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

6. Enable the PHP GD extension in `php.ini`:

```ini
extension=gd
```

7. Create a MySQL database named:

```text
pos_tfa4
```

8. Import the included database export:

```text
database_export/pos_tfa4.sql
```

9. Start the CodeIgniter development server:

```bash
php spark serve --port 8081
```

For the Windows and XAMPP configuration used during development:

```powershell
& "D:\Xampp\php\php.exe" .\spark serve --port 8081
```

10. Open the application:

```text
http://localhost:8081/
```

## Demonstration Accounts

### Administrator Account

```text
Username: admin01
Password: Admin123!
```

### Test Staff Account

```text
Username: teststaff01
Password: Staff123!
```

These credentials are intended only for laboratory demonstration and should be changed before production use.

## Protected Routes

The following routes require an authenticated session:

```text
/customers
/customers/new
/customers/create
/customers/{id}/edit
/customers/{id}/update
/users
/users/new
/users/create
/users/{id}/edit
/users/{id}/update
```

A logged-out user who attempts to access a protected route is redirected to the login page.

## Avatar Storage

Prepared avatar images are stored in:

```text
public/uploads/avatars
```

The application accepts JPG and PNG images no larger than 2 MB. Valid images are prepared as centered 300-by-300-pixel avatars. Only the generated filename is stored in the `avatar` column of the `users` table.

Accounts without an uploaded avatar display:

```text
public/uploads/avatars/placeholder.svg
```

## Database Tables

The application uses:

- `customers`
- `users`

The `users` table contains:

- Unique username
- Full name
- Hashed password
- Nullable avatar filename
- Record creation timestamp

## Database Export

The completed database export is located at:

```text
database_export/pos_tfa4.sql
```

## Developer

**Janyrose Guelas**

GitHub: [@17jany](https://github.com/17jany)

Developed for the IT0049 TFA4 laboratory activity using CodeIgniter 4, PHP, MySQL, sessions, controller filters, and the GD image library.