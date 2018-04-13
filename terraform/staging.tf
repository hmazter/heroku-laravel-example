# App
resource "heroku_app" "staging" {
  name   = "${var.heroku_app_name}-staging"
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
resource "heroku_addon" "database" {
  app  = "${heroku_app.staging.name}"
  plan = "heroku-postgresql:hobby-dev"
}

# Redis
resource "heroku_addon" "redis" {
  app  = "${heroku_app.staging.name}"
  plan = "heroku-redis:hobby-dev"
}
