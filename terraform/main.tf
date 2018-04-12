provider "heroku" {
  email   = "${var.heroku_email}"
  api_key = "${var.heroku_api_key}"
}

# App
resource "heroku_app" "app" {
  name   = "${var.heroku_app_name}"
  region = "eu"

  config_vars = {
    APP_KEY = "${var.app_key}"
    DB_CONNECTION = "heroku"
    LOG_CHANNEL = "errorlog"
  }
}

# Database
resource "heroku_addon" "database" {
  app  = "${heroku_app.app.name}"
  plan = "heroku-postgresql:hobby-dev"
}

# Redis
resource "heroku_addon" "redis" {
  app  = "${heroku_app.app.name}"
  plan = "heroku-redis:hobby-dev"
}

output "heroku-git-url" {
  value = "${heroku_app.app.git_url}"
}
