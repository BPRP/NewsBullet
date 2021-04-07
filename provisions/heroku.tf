provider "heroku" {
	email   = var.heroku_email
	api_key = var.heroku_api_key
}

resource "heroku_app" "develop" {
	name       = var.heroku_develop_app
	region     = var.heroku_region
	buildpacks = var.heroku_app_buildpacks
}

resource "heroku_app" "staging" {
	name       = var.heroku_staging_app
	region     = var.heroku_region
	buildpacks = var.heroku_app_buildpacks
}

resource "heroku_app" "production" {
	name       = var.heroku_production_app
	region     = var.heroku_region
	buildpacks = var.heroku_app_buildpacks
}

# Create a Heroku pipeline
resource "heroku_pipeline" "pipeline" {
	name = var.heroku_pipeline_name
}

# Couple apps to different pipeline stages
resource "heroku_pipeline_coupling" "develop" {
	app      = heroku_app.develop.name
	pipeline = heroku_pipeline.pipeline.id
	stage    = "development"
}

resource "heroku_pipeline_coupling" "staging" {
	app      = heroku_app.staging.name
	pipeline = heroku_pipeline.pipeline.id
	stage    = "staging"
}

resource "heroku_pipeline_coupling" "production" {
	app      = heroku_app.production.name
	pipeline = heroku_pipeline.pipeline.id
	stage    = "production"
}
