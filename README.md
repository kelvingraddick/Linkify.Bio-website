# Linkify.Bio website

Small PHP app for creating a simple bio page with social auth and editable links.

## Database setup

This project expects a MySQL-compatible database named `linkify.bio` by default.

1. Create the database and tables:

   ```sql
   SOURCE database/schema.sql;
   ```

   Or from the shell:

   ```bash
   mysql -u root -p < database/schema.sql
   ```

2. Update `components/configuration.php` with your local database credentials if needed.

## Schema notes

The checked-in schema covers the tables the app currently uses:

- `users`
  - stores profile data plus Instagram and Twitter auth fields
- `links`
  - stores each user link, enabled state, impressions, and clicks

The SQL was inferred from the current PHP queries so new installs do not have to reverse engineer the table structure from the source.
