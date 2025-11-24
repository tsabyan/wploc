# WordPress Local Development Environment

This is a Docker-based WordPress development environment with MySQL and phpMyAdmin.

## Services

- **WordPress**: http://localhost:8000
- **phpMyAdmin**: http://localhost:8080

## Database Credentials

### WordPress Database
- Database Name: `wordpress`
- Username: `wordpress`
- Password: `wordpress`
- Host: `db`

### phpMyAdmin
- Username: `root`
- Password: `rootpassword`

## Getting Started

1. Start the containers:
   ```bash
   docker-compose up -d
   ```

2. Wait for WordPress to download and install (first run takes a few minutes)

3. Access WordPress at http://localhost:8000 and complete the installation wizard

4. Access phpMyAdmin at http://localhost:8080

## Common Commands

- **Start containers**: `docker-compose up -d`
- **Stop containers**: `docker-compose down`
- **View logs**: `docker-compose logs -f`
- **Restart containers**: `docker-compose restart`
- **Remove everything** (including database): `docker-compose down -v`

## Project Structure

- `wordpress/` - WordPress files will be installed here
- `docker-compose.yml` - Docker configuration
- Database data is stored in a Docker volume

## Notes

- WordPress files are stored in the `./wordpress` directory
- The database is persisted in a Docker volume
- On first run, WordPress will automatically download and install its files
