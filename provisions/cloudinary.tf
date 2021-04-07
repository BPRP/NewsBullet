resource "heroku_addon" "cloudinary_develop" {
	app  = heroku_app.develop.name
	plan = "cloudinary:starter"
}

resource "heroku_addon" "cloudinary_staging" {
	app  = heroku_app.staging.name
	plan = "cloudinary:starter"
}

resource "heroku_addon" "cloudinary_production" {
	app  = heroku_app.production.name
	plan = "cloudinary:starter"
}
