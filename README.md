# danieldeepak.com — Twenty Twenty-Five Child Theme

This repository contains the child theme for [danieldeepak.com](https://danieldeepak.com), built on top of the WordPress core "Twenty Twenty-Five" block theme.

## Setting up WordPress with WP-CLI

These steps set up a fresh WordPress install using [WP-CLI](https://wp-cli.org/).

### 1. Install WP-CLI

```bash
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
chmod +x wp-cli.phar
sudo mv wp-cli.phar /usr/local/bin/wp
wp --info
```

### 2. Download WordPress core

```bash
mkdir -p /path/to/site && cd /path/to/site
wp core download
```

### 3. Create the `wp-config.php` file

```bash
wp config create \
  --dbname=your_db_name \
  --dbuser=your_db_user \
  --dbpass=your_db_password \
  --dbhost=localhost
```

Make sure the database exists first (`wp db create` will create it if the credentials above have permission).

### 4. Install WordPress

```bash
wp core install \
  --url="https://danieldeepak.test" \
  --title="Daniel Deepak" \
  --admin_user=admin \
  --admin_password=changeme \
  --admin_email=admin@example.com
```

### 5. Point your local domain at the install

Add a vhost/server block for your local domain (e.g. `danieldeepak.test`) pointing at the WordPress install root, and add the host to `/etc/hosts` if needed.

## Setting up the child theme

The theme in this repository (`twentytwentyfive-child`) depends on the WordPress core "Twenty Twenty-Five" parent theme.

### 1. Install the parent theme

```bash
wp theme install twentytwentyfive
```

### 2. Place this repository in `wp-content/themes/`

Clone (or symlink) this repo so its contents live at:

```
wp-content/themes/twentytwentyfive-child/
```

```bash
cd wp-content/themes
git clone git@github-bellatech:bellatechnologies/danieldeepak-personal-website.git twentytwentyfive-child
```

### 3. Activate the child theme

```bash
wp theme activate twentytwentyfive-child
```

### 4. Verify

```bash
wp theme list
```

`twentytwentyfive-child` should show as `active`, with `twentytwentyfive` listed as the parent.

## Theme structure

- `style.css` — theme header + all custom styles
- `theme.json` — block editor settings, typography, template parts registration
- `functions.php` — enqueues styles, front-page JSON-LD
- `templates/` — block theme page templates (e.g. `front-page.html`, `page-about.html`)
- `parts/` — reusable template parts (header, footer)
- `assets/` — fonts, SVGs, and other static assets
