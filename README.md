# Appel d'offre | 4L Trophy

### Dev Team

	- Lucas Martin (CTO & Front-end)
	- Elhaddad Malidi (Front-end)

### Content
The directories:
* __sass/__
    * views/ (Each part of your sass)  
    * app.scss (Import each file in the views directory)
    * reset.scss
* __js/__
    * app/ (The js files directoy)
    * dist/ (The compiled js directory in *app.js*)
    * vendor/ (The libraries you include)
* __stylesheets/__ (The compiled scss in *app.css*)


### Installation

1. Download the repo

2. Install the dependencies: `npm install`

3. Build the app: `gulp build`

### Development | Gulp scripts:

* Run `gulp` to watch any changes and auto-compile

* Run `gulp build` to compile one time the project

* Run `gulp sass` to compile scss

* Run `gulp js_app` to compile js files from js/app in js/dist/app.js

* Run `gulp js_libs` to compile js/vendor libs in js/dist/vendor.js

#### A repo from [Lucas Martin](https://twitter.com/lmarti17 "Link to twitter profile")




