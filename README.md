# Easybuy

## 🚀 Setup

```bash
cd backend

# Install dependencies
composer install

# Environment setup
cp .env.example .env
php artisan key:generate

# Configure your .env: DB credentials, Stripe keys, SMTP settings

# Run migrations
php artisan migrate

# Serve
php artisan serve
```

## ⚠️ Note

This project was developed as a learning exercise to practice secure application design in Laravel (payment integration, auth hardening, and defensive middleware patterns). It is not intended for production use as-is.

## 📡 Author

**Driss Chekraoui** — Cybersecurity Engineering Student
[LinkedIn](https://www.linkedin.com/in/driss-chekraoui-02701025b/) · [GitHub](https://github.com/chekraouidriss)
