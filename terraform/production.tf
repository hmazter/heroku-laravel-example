# App
resource "heroku_app" "production" {
  name   = "${var.heroku_app_name}-production"
  region = "eu"

  config_vars = {
    APP_KEY       = "${var.app_key}"
    DB_CONNECTION = "heroku"
    LOG_CHANNEL   = "errorlog"
  }

  buildpacks = [
    "heroku/php",
    "heroku/nodejs",
  ]
}

# Database
resource "heroku_addon" "database-production" {
  app  = "${heroku_app.production.name}"
  plan = "heroku-postgresql:hobby-dev"
}

# Redis
resource "heroku_addon" "redis-production" {
  app  = "${heroku_app.production.name}"
  plan = "heroku-redis:hobby-dev"
}
