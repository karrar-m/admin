#!/bin/bash

# Laravel Environment Switcher Script
# Usage: ./switch-env.sh [dev|uat|production]

if [ $# -eq 0 ]; then
    echo "Usage: $0 [dev|uat|production]"
    echo "Current environment files available:"
    ls -la .env*
    exit 1
fi

ENV=$1

case $ENV in
    "dev")
        cp .env.dev .env
        echo "✅ Switched to DEVELOPMENT environment"
        echo "   - Debug: ON"
        echo "   - Database: SQLite (Dev)"
        echo "   - Log Level: debug"
        ;;
    "uat")
        cp .env.uat .env
        echo "✅ Switched to UAT environment"
        echo "   - Debug: ON"
        echo "   - Database: PostgreSQL (UAT)"
        echo "   - Log Level: info"
        ;;
    "production")
        cp .env.production .env
        echo "✅ Switched to PRODUCTION environment"
        echo "   - Debug: OFF"
        echo "   - Database: PostgreSQL (Production)"
        echo "   - Log Level: error"
        echo "   - ⚠️  Make sure to update production credentials!"
        ;;
    *)
        echo "❌ Invalid environment: $ENV"
        echo "Available environments: dev, uat, production"
        exit 1
        ;;
esac

# Clear Laravel caches
echo "🔄 Clearing Laravel caches..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

echo "✨ Environment switch complete!"
