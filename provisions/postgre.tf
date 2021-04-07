resource "heroku_addon" "database_develop" {
	app  = heroku_app.develop.name
	plan = "heroku-postgresql:hobby-dev"
}

resource "heroku_addon" "database_staging" {
	app  = heroku_app.staging.name
	plan = "heroku-postgresql:hobby-dev"
}

resource "heroku_addon" "database_prod" {
	app  = heroku_app.production.name
	plan = "heroku-postgresql:hobby-dev"
}
