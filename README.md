# Azərbaycan Həkimləri Kataloqu

SEO-optimized doctors directory website built with PHP and MySQL. Features doctor profiles, categories, regions, and workplaces with clean, modern design.

## Features

- **SEO Optimized**: Clean URLs, meta tags, structured data, sitemap
- **Responsive Design**: Works perfectly on all devices
- **Advanced Search**: Filter by category, region, workplace, and keywords
- **Doctor Profiles**: Detailed doctor information with ratings
- **Modern UI**: Clean, professional design with smooth animations
- **Performance**: Optimized for fast loading and better user experience

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache or Nginx web server
- mod_rewrite enabled (for Apache)

## Installation

### 1. Database Setup

1. Create a new MySQL database:
```sql
CREATE DATABASE doctors_directory CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

2. Import the database structure:
```bash
mysql -u username -p doctors_directory < database.sql
```

### 2. Configuration

1. Edit `config/database.php` and update database credentials:
```php
private $host = "localhost";
private $db_name = "doctors_directory";
private $username = "your_username";
private $password = "your_password";
```

### 3. File Permissions

Set proper permissions:
```bash
chmod 755 assets/
chmod 644 assets/css/*.css
chmod 644 assets/js/*.js
chmod 644 *.php
chmod 644 templates/*.php
```

### 4. Web Server Configuration

#### Apache
- Ensure `.htaccess` file is present in root directory
- Enable mod_rewrite module
- Set `AllowOverride All` in virtual host configuration

#### Nginx
Add this to your server block:
```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}

location ~ \.php$ {
    fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
    fastcgi_index index.php;
    fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    include fastcgi_params;
}
```

## Directory Structure

```
├── assets/
│   ├── css/
│   │   └── main.css
│   └── js/
│       └── main.js
├── config/
│   └── database.php
├── includes/
│   └── functions.php
├── templates/
│   ├── header.php
│   ├── footer.php
│   ├── home.php
│   ├── doctor-detail.php
│   ├── category-page.php
│   ├── region-page.php
│   └── workplace-page.php
├── .htaccess
├── index.php
├── database.sql
└── README.md
```

## SEO Features

### URLs
- Clean, SEO-friendly URLs: `/doctor/123/doctor-name`
- Category pages: `/category/kardioloq`
- Region pages: `/region/nesimi-rayonu`

### Meta Tags
- Dynamic title and description based on content
- Open Graph tags for social media sharing
- Twitter Card support
- Canonical URLs

### Structured Data
- JSON-LD schema markup for better search engine understanding
- Doctor profiles with structured data
- Website search functionality markup

### Performance
- Gzip compression
- Cache headers
- Optimized images
- Minified CSS and JavaScript

## Adding Content

### Adding Doctors
```sql
INSERT INTO doctors (title, fullName, category_id, region_id, workplace_id, phone, haqqinda, tehsil, rating) 
VALUES ('Dr.', 'Doctor Name', 1, 1, 1, '+994 XX XXX XX XX', 'About doctor...', 'Education info...', 4.5);
```

### Adding Categories
```sql
INSERT INTO doctor_categories (name, slug) 
VALUES ('Category Name', 'category-slug');
```

### Adding Regions
```sql
INSERT INTO regions (address, slug) 
VALUES ('Region Name', 'region-slug');
```

### Adding Workplaces
```sql
INSERT INTO doctor_workplaces (name, slug) 
VALUES ('Hospital Name', 'hospital-slug');
```

## Customization

### Styling
- Edit `assets/css/main.css` to customize appearance
- Color scheme can be changed by updating CSS variables
- Responsive breakpoints can be adjusted

### Functionality
- Add new features in `includes/functions.php`
- Create new templates in `templates/` directory
- Update routing in `index.php`

## Security

- Input sanitization and validation
- SQL injection prevention with prepared statements
- XSS protection with htmlspecialchars()
- CSRF protection recommended for admin forms
- Secure headers in .htaccess

## Browser Support

- Chrome 90+
- Firefox 88+
- Safari 14+
- Edge 90+
- Internet Explorer 11 (limited support)

## License

This project is open source and available under the MIT License.

## Support

For support and questions, please create an issue in the project repository.