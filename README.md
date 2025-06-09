<p align="center">
  <img src="docs/logo.png" width="200" alt="NeedKos Logo" />
</p>

<h1 align="center">NeedKos</h1>
<h3 align="center">Modern Boarding House Search Platform</h3>

<p align="center">
  <em>A modern, fast, and user-friendly boarding house search platform inspired by services like Mamikos.</em><br />
  Built with <strong>Laravel 10</strong>, <strong>TailwindCSS</strong>, and <strong>Filament v3</strong> to provide the best experience for tenants and boarding house owners.
</p>

<p align="center">
  <a href="https://github.com/kelvianov/Laravel-NeedKos/actions">
    <img src="https://img.shields.io/github/actions/workflow/status/kelvianov/Laravel-NeedKos/ci.yml?branch=main&style=for-the-badge" alt="Build Status" />
  </a>
  <a href="https://github.com/kelvianov/Laravel-NeedKos/blob/main/LICENSE">
    <img src="https://img.shields.io/github/license/kelvianov/Laravel-NeedKos?style=for-the-badge" alt="License" />
  </a>
  <a href="https://github.com/kelvianov/Laravel-NeedKos/issues">
    <img src="https://img.shields.io/github/issues/kelvianov/Laravel-NeedKos?style=for-the-badge" alt="Issues" />
  </a>
  <a href="https://github.com/kelvianov/Laravel-NeedKos/stargazers">
    <img src="https://img.shields.io/github/stars/kelvianov/Laravel-NeedKos?style=for-the-badge" alt="Stars" />
  </a>
</p>

---

## 📋 Table of Contents

- [Overview](#-overview)
- [Key Features](#-key-features)
- [Technology Stack](#-technology-stack)
- [System Requirements](#-system-requirements)
- [Installation Guide](#-installation-guide)
- [Configuration](#-configuration)
- [Usage](#-usage)
- [API Documentation](#-api-documentation)
- [Contributing](#-contributing)
- [Testing](#-testing)
- [Deployment](#-deployment)
- [License](#-license)
- [Support](#-support)

---

## 🎯 Overview

**NeedKos** is a comprehensive boarding house search platform that bridges the gap between property owners and tenants. The application provides a seamless experience for users to find, manage, and rent boarding houses with advanced filtering, real-time search, and professional management tools.

### 🌟 Project Highlights

- **Modern Architecture**: Built on Laravel 10 with clean, maintainable code
- **Professional UI**: Responsive design with TailwindCSS and custom styling
- **Admin Panel**: Powerful management interface using Filament v3
- **Role-based Access**: Secure authentication system for different user types
- **Real-time Features**: Interactive search and filtering capabilities

---

## ✨ Key Features

### 🔍 **Advanced Search & Filtering System**
- Real-time property search with multiple filter options
- Location-based filtering with map integration
- Price range, facilities, and room type filters
- Smart search suggestions and autocomplete

### 🏠 **Comprehensive Property Management**
- Detailed property listings with photo galleries
- Interactive maps and location services
- Complete facility descriptions and amenities
- Virtual tours and 360° views support

### 👥 **Multi-Role Authentication System**
- **Admin**: Full system control and user management
- **Property Owner**: Property listing and tenant management
- **Tenant**: Property search and booking capabilities
- Secure registration and login processes

### 🎛️ **Professional Admin Dashboard**
- Built with Filament v3 for optimal performance
- Real-time analytics and reporting
- User management and role assignment
- Property approval and moderation tools

### 🎨 **Modern User Interface**
- Responsive design for all device types
- Dark/Light mode toggle support
- Accessibility-compliant design (WCAG 2.1)
- Smooth animations and micro-interactions

### 📱 **Mobile-First Design**
- Progressive Web App (PWA) ready
- Touch-optimized interface
- Offline functionality support
- Cross-platform compatibility

---

## 🛠️ Technology Stack

<table>
<tr>
<td><strong>Backend</strong></td>
<td><strong>Frontend</strong></td>
<td><strong>Database</strong></td>
<td><strong>Tools & Services</strong></td>
</tr>
<tr>
<td>

- Laravel 10.x
- PHP 8.1+
- Filament v3
- Laravel Sanctum
- Laravel Queue

</td>
<td>

- TailwindCSS 3.x
- Blade Templates
- Alpine.js
- Vanilla JavaScript
- CSS3 Animations

</td>
<td>

- MySQL 8.0+
- Redis (Caching)
- Laravel Migrations
- Database Seeders

</td>
<td>

- Composer
- NPM/Yarn
- Git
- Docker (Optional)
- Laravel Mix/Vite

</td>
</tr>
</table>

---

## 💻 System Requirements

### Minimum Requirements
- **PHP**: 8.1 or higher
- **Composer**: 2.0+
- **Node.js**: 16.x or higher
- **MySQL**: 8.0+ or MariaDB 10.3+
- **Web Server**: Apache 2.4+ or Nginx 1.18+

### Recommended Requirements
- **PHP**: 8.2+
- **Memory**: 512MB+ RAM
- **Storage**: 1GB+ free space
- **Redis**: For caching and sessions

### Development Environment
- **Laravel Valet** (macOS)
- **Laravel Homestead** (Cross-platform)
- **Docker** with Laravel Sail
- **XAMPP/WAMP** (Windows)

---

## 🚀 Installation Guide

### Quick Start

```bash
# Clone the repository
git clone https://github.com/kelvianov/Laravel-NeedKos.git
cd Laravel-NeedKos

# Install PHP dependencies
composer install

# Install and build frontend assets
npm install
npm run build

# Setup environment configuration
cp .env.example .env
php artisan key:generate

# Configure your database in .env file
# DB_DATABASE=needkos_db
# DB_USERNAME=your_username
# DB_PASSWORD=your_password

# Run database migrations and seeders
php artisan migrate --seed

# Start the development server
php artisan serve
```

### Detailed Installation Steps

<details>
<summary>Click to expand detailed installation steps</summary>

#### 1. Prerequisites Installation

```bash
# Install PHP (Ubuntu/Debian)
sudo apt update
sudo apt install php8.1 php8.1-cli php8.1-common php8.1-mysql php8.1-xml php8.1-curl

# Install Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Install Node.js
curl -fsSL https://deb.nodesource.com/setup_18.x | sudo -E bash -
sudo apt-get install -y nodejs
```

#### 2. Project Setup

```bash
# Clone and navigate
git clone https://github.com/kelvianov/Laravel-NeedKos.git
cd Laravel-NeedKos

# Set proper permissions (Linux/macOS)
chmod -R 775 storage bootstrap/cache
```

#### 3. Environment Configuration

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Create storage link
php artisan storage:link
```

#### 4. Database Setup

```sql
-- Create database
CREATE DATABASE needkos_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

```bash
# Run migrations and seeders
php artisan migrate:fresh --seed

# Create admin user (optional)
php artisan make:filament-user
```

</details>

---

## ⚙️ Configuration

### Environment Variables

Create your `.env` file based on `.env.example` and configure the following:

```env
# Application
APP_NAME="NeedKos"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=needkos_db
DB_USERNAME=root
DB_PASSWORD=

# Cache & Sessions
CACHE_DRIVER=redis
SESSION_DRIVER=redis
REDIS_HOST=127.0.0.1

# Mail Configuration
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password

# File Storage
FILESYSTEM_DISK=local
```

### Additional Configuration

```bash
# Optimize application for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Clear caches during development
php artisan optimize:clear
```

---

## 📖 Usage

### For Property Owners

1. **Registration**: Create an owner account
2. **Property Listing**: Add property details, photos, and facilities
3. **Management**: Track bookings and manage tenants
4. **Analytics**: View property performance metrics

### For Tenants

1. **Search**: Use filters to find suitable properties
2. **Compare**: Save and compare multiple properties
3. **Book**: Submit booking requests directly
4. **Reviews**: Rate and review properties

### For Administrators

1. **Dashboard**: Monitor overall platform activity
2. **User Management**: Manage users and roles
3. **Content Moderation**: Approve/reject property listings
4. **Analytics**: Generate comprehensive reports

---

## 📚 API Documentation

### Authentication Endpoints

```http
POST /api/register
POST /api/login
POST /api/logout
GET  /api/user
```

### Property Endpoints

```http
GET    /api/properties
POST   /api/properties
GET    /api/properties/{id}
PUT    /api/properties/{id}
DELETE /api/properties/{id}
```

### Search Endpoints

```http
GET /api/search?location={location}&price_min={min}&price_max={max}
GET /api/filters
```

For complete API documentation, visit `/api/documentation` after installation.

---

## 🤝 Contributing

We welcome contributions from the community! Please read our [Contributing Guidelines](CONTRIBUTING.md) for details.

### Development Workflow

```bash
# Fork the repository
# Create a feature branch
git checkout -b feature/amazing-feature

# Make your changes
# Commit your changes
git commit -m 'Add some amazing feature'

# Push to the branch
git push origin feature/amazing-feature

# Open a Pull Request
```

### Code Standards

- Follow PSR-12 coding standards
- Write comprehensive tests
- Document your code
- Follow conventional commit messages

---

## 🧪 Testing

```bash
# Run all tests
php artisan test

# Run specific test suite
php artisan test --testsuite=Feature

# Run with coverage
php artisan test --coverage

# Run tests in parallel
php artisan test --parallel
```

---

## 🚢 Deployment

### Production Deployment

```bash
# Optimize for production
composer install --no-dev --optimize-autoloader
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set proper permissions
chmod -R 755 storage bootstrap/cache
```

### Using Docker

```bash
# Build and run with Docker
docker-compose up -d

# Run migrations in container
docker-compose exec app php artisan migrate --seed
```

### Server Requirements

- **Web Server**: Apache/Nginx with proper rewrites
- **PHP**: 8.1+ with required extensions
- **SSL Certificate**: Required for production
- **Backup Strategy**: Regular database and file backups

---

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

## 🆘 Support

### Getting Help

- 📧 **Email**: support@needkos.com
- 💬 **Discord**: [Join our community](https://discord.gg/needkos)
- 📚 **Documentation**: [docs.needkos.com](https://docs.needkos.com)
- 🐛 **Bug Reports**: [GitHub Issues](https://github.com/kelvianov/Laravel-NeedKos/issues)

### Frequently Asked Questions

<details>
<summary>How do I reset my admin password?</summary>

```bash
php artisan make:filament-user
```
</details>

<details>
<summary>How do I configure email settings?</summary>

Update your `.env` file with proper MAIL_* configuration and test with:
```bash
php artisan tinker
Mail::raw('Test email', function($msg) { $msg->to('test@example.com')->subject('Test'); });
```
</details>

---

## 🙏 Acknowledgments

- **Laravel Team** - For the amazing framework
- **Filament Team** - For the powerful admin panel
- **TailwindCSS Team** - For the utility-first CSS framework
- **Open Source Community** - For continuous inspiration and support

---

<div align="center">

**Built with ❤️ by [Kelvianov](https://github.com/kelvianov)**

[⭐ Star this repository](https://github.com/kelvianov/Laravel-NeedKos/stargazers) | [🐛 Report Bug](https://github.com/kelvianov/Laravel-NeedKos/issues) | [💡 Request Feature](https://github.com/kelvianov/Laravel-NeedKos/issues)

</div>
